<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

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
        if(!session()->has('sort')) session()->put('sort','desc');
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('author')->orderBy('publication_date', session('sort'))->get();
       
        return view('home',compact('posts'));
    }

    public function getPosts($slug)
    {
        
        $post = Post::with('author')->where('slug', $slug)->first();

        
        return view('post',compact('post'));
    }

    public function sortByPublicationDate(Request $request)
    {
        session()->forget('sort');
        session()->put('sort', $request->sort);

        return redirect()->back();
    }
}
