<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts= Post::orderBy('id','desc')->paginate(10);
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $images= Image::orderBy('id','desc')->get();
        return view('post.create',compact('images'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'slug' => 'required',
        ]);
        // store
        $post= new Post([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'slug' => $request->get('slug'),
            'user_id' => Auth::user()->id,
        ]);
        $post->save();
        // redirect
        return redirect()->route('post.index')->with('success', 'Post has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post= Post::find($id);
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $images= Image::orderBy('id','desc')->get();
        $post= Post::find($id);
        return view('post.edit',compact('post','images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'slug' => 'required',
        ]);
        $post= Post::find($id);
        $post->title=$request->get('title');
        $post->body=$request->get('body');
        $post->slug=$request->get('slug');
        $post->save();
        return redirect()->route('post.index')->with('success', 'Post has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post= Post::find($id);
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post has been deleted successfully.');
    }
}
