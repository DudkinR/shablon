<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $posts = Post::orderBy('id','desc')->paginate(5);
        return view('home',compact('posts'));
    }
    // welcome
    public function welcome(Request $request)
    {
        $posts = Post::orderBy('id','desc')->paginate(5);
        return view('welcome',compact('posts'));
    }

    public function showpost(Request $request, $id, $page = null)
    {
        $post = Post::find($id);
        $posts = Post::orderBy('id', 'desc')->get('id');
        return view('post', compact('post', 'posts'));
    }

}
