<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::paginate(7);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories|max:50|min:3',
            'description' => 'nullable|string'
        ]);
        if ($validator->fails()) {
            return redirect('admin/categories/create')->withErrors($validator)->withInput();
        }
        $status = $request->status ? 1 : 0;
        Category::create(['name' => $request->name, 'description' => $request->description, 'status' => $status]);
//        Category::create($request->all());
        return redirect()->route('admin.categories.index')->withMessage('Category created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update(['name' => $request->name, 'description' => $request->description, 'status' => ($request->status == 'on') ? 1 : 0]);
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }

    public function trashed()
    {
        $categories = Category::onlyTrashed()->get();
        return view('admin.categories.trashed', compact('categories'));
    }

    public function restore($id)
    {
        Category::withTrashed()->where('id', $id)->restore();
        return redirect()->route('admin.categories.index');
    }

    public function force($id)
    {
        $category = Category::withTrashed()->where('id', $id)->first();
        $category->forceDelete();
        return redirect()->route('admin.categories.index');
    }

}
