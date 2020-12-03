<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = \DB::select("SELECT * FROM posts");
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \DB::select("SELECT * FROM categories");
        $users = \DB::select("SELECT * FROM users");
        return view('admin.posts.create',compact('categories','users'));
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
        \DB::insert("INSERT INTO posts (name,status,votes,comments,category_id,user_id,content,created_at,updated_at) VALUES (?,?,?,?,?,?,?,?,?)", [$request->name, $status, $request->votes, $request->comments, $request->category_id, $request->user_id, $request->content, now(), now()]);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = \DB::select("SELECT * FROM users");
        $categories = \DB::select("SELECT * FROM categories");
        $post = \DB::select("SELECT * from posts WHERE id = ?", [$id])[0];
        return view('admin.posts.show', compact('post','users','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = \DB::select("SELECT * FROM users");
        $categories = \DB::select("SELECT * FROM categories");
        $post = \DB::select("SELECT * FROM posts WHERE id=?", [$id])[0];
        return view('admin.posts.edit', compact('post','categories','users'));
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
        $status = $request->status ? 1 : 0;
        \DB::update("UPDATE posts SET name=?, status =?, votes =?, comments =?, category_id =?, user_id =?, content =?,updated_at=?
        where id = ?", [$request['name'], $status, $request['votes'], $request['comments'], $request['category_id'], $request['user_id'], $request['content'], now(), $id]);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::delete('DELETE FROM posts WHERE id = ?', [$id]);
        return redirect()->route('admin.posts.index');
    }
}
