<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Cache;
use Illuminate\Support\Facades\Redis;
use App\Jobs\AutoImportPosts;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        
        $currentPage = request()->get('page',1);

       $posts = Cache::remember($this->post->cacheKey().'-'.$currentPage,60,function(){

            return $posts = Post::with('author')
                                ->where('user_id', auth()->user()->id)
                                // ->get();
                                ->paginate(15);
       });
        
                   
        return view('blog.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post([
            'title' => $request->title,
            'slug'  => $request->title,
            'description' =>  $request->description,
            'publication_date' => now(),
            //    'user_id ' => auth()->user()->id
        ]);
       
        $user = auth()->user();
       
        $user->posts()->save($post);

        return redirect()->route('dashboard')->with('status','Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('dashboard.show',compact('post'));
    }

    public function importExternalPosts()
    {
        // AutoImportPosts::dispatch();
        retry(20, function () {
            dispatch(new AutoImportPosts());
        }, 200);
    }

   
}
