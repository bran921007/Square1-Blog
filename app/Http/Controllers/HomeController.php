<?php

namespace App\Http\Controllers;

use App\Post;
use Cache;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        if(!session()->has('sort')) session()->put('sort','desc');
        $this->post = $post;
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentPage = request()->get('page', 1);

        $posts = Cache::remember($this->post->cacheKey() . '-' . $currentPage, 60, function () {
            return Post::with('author')
                    ->orderBy('publication_date', session('sort'))
                    ->paginate(15);
        });
        
       
        return view('home',compact('posts'));
    }

    
    public function getPost($slug)
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
