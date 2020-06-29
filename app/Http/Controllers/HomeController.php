<?php

namespace App\Http\Controllers;

use App\Post;
use Cache;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redis;

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
        
    
        return view('blog.home',compact('posts'));
    }

    
    public function getPost($slug)
    {

        $post = Cache::remember('post_'.$slug, 60, function () use ($slug) {
            return Post::with('author')
                        ->where('slug', $slug)
                        ->first();
        });
        
    
        return view('blog.post',compact('post'));
    }

    public function sortByPublicationDate(Request $request)
    {

        $currentPage = request()->get('page', 1);        
        cache()->forget($this->post->cacheKey() . '-' . $currentPage);  

        session()->forget('sort');
        session()->put('sort', $request->sort);

        return redirect()->back();
    }
}
