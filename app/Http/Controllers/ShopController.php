<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Product, Brand, Category};
use Cart;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::whereStatus(1)->with('brand')->with('category')->paginate(8);
        return view('site.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::whereId($id)->with('brand')->with('category')->with('pictures')->firstOrFail();
        return view('site.product', compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        $product = Product::whereId($request->input('productId'))->with('pictures')->firstOrFail();
        $options = ['picture' => $product->pictures[0]->filename];
        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('quantity'), $options);
        return redirect()->back()->with('message', 'Product added to cart successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getByCategory($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products()->wherePivot('category_id', $id)
            ->with('brand')
            ->with('category')
            ->paginate(12);

        return view('site.index', compact('products'));
    }

    public function getByBrand($id)
    {
        $products = Product::where([['brand_id', $id]])->with('category')->with('brand')->with('pictures')->paginate(12);
        return view('site.index', compact('products'));
    }
}
