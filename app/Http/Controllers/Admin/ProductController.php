<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\{Product, Brand, Category, Picture};
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $products = Product::paginate(12);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = $request->status ? 1 : 0;
        $product = Product::create(['name' => $request->name, 'price' => $request->price, 'details' => $request->details, 'description' => $request->description, 'status' => $status, 'brand_id' => $request->brand_id]);
        if ($request->images) {
            foreach ($request->images as $file) {
                $filename = $this->uploadImage($file);
                $picture = Picture::create([
                    'filename' => $filename,
                ]);
                $product->pictures()->attach($picture->id);
            }
        }
        $category = Category::find($request->categories);
        $product->category()->attach($category);
        return redirect()->route('admin.products.index')->withMessage('Product created successfully');
    }

    public function uploadImage(UploadedFile $file): string
    {
        $filename = md5($file->getClientOriginalName() . time()) . uniqid('', true);
        $file->storeAs('public/products', $filename);
        return asset('storage/products/' . $filename);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'brands', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        if ($request->images) {
            $ids = $request->images;
            foreach ($ids as $id) {
                $picture = Picture::where('id', $id)->first();
                $filename = parse_url($picture->filename, PHP_URL_PATH);
                Storage::delete("public/products/" . $filename);
                $product->pictures()->detach($id);
                $picture->delete();
            }
            foreach ($request->images as $file) {
                $filename = $this->uploadImage($file);
                $picture = Picture::create([
                    'filename' => $filename,
                ]);
                $product->pictures()->attach($picture->id);
            }
        }
        $product->category()->sync($request->categories);
        return redirect()->route('admin.products.index')->withMessage('Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }

    public function trashed()
    {
        $products = Product::onlyTrashed()->get();
        return view('admin.products.trashed', compact('products'));
    }

    public function restore($id)
    {
        Product::withTrashed()->where('id', $id)->restore();
        return redirect()->route('admin.products.index');
    }

    public function force($id)
    {
        $product = Product::withTrashed()->where('id', $id)->first();
        $product->forceDelete();
        return redirect()->route('admin.products.index');
    }

}

