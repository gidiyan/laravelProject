<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $brands = Brand::paginate();
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'logo' => 'mimes:jpg,jpeg,png,svg|max:1000'
        ]);
        $brand = Brand::create($request->all());
        if (!$brand) {
            return back()->withInput();
        }
        return redirect()->route('admin.brands.index')->withMessage('Brand created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brands.index');
    }

    public function trashed()
    {
        $brands = Brand::onlyTrashed()->get();
        return view('admin.brands.trashed', compact('brands'));
    }

    public function restore($id)
    {
        Brand::withTrashed()->where('id', $id)->restore();
        return redirect()->route('admin.brands.index');
    }

    public function force($id)
    {
        $category = Brand::withTrashed()->where('id', $id)->first();
        $category->forceDelete();
        return redirect()->route('admin.brands.index');
    }
}
