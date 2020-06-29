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
    private $user;
    
    public function __construct(Post $post)
    {
        
        $this->post = $post;
        if (!session()->has('sort_panel')) session()->put('sort_panel', 'desc');
    }
    
    public function index()
    {
        
        $posts = Post::with('author')
        ->where('user_id', auth()->user()->id)
        ->orderBy('publication_date', session('sort_panel'))
        ->paginate(15);
        
        if (auth()->user()->is_admin)
        $posts = Post::with('author')
        ->orderBy('publication_date', session('sort_panel'))
        ->paginate(15);  
        
        
        
        return view('admin.index', compact('posts'));
        
    }
    
    public function create()
    {
        return view('admin.create');
    }
    
    public function store(PostRequest $request)
    {
        $post = new Post([
            'title' => $request->title,
            'slug'  => $request->title,
            'description' =>  $request->description,
            'publication_date' => now(),
            ]);
            
            $user = auth()->user();
            
            $user->posts()->save($post);
            
            return redirect()->route('dashboard')->with('status','Post created successfully');
        }
        
        
        public function show($id)
        {
            $post = Post::findOrFail($id);
            return view('dashboard.show',compact('post'));
        }
        
        public function sortByPublicationDate(Request $request)
        {
            session()->forget('sort_panel');
            session()->put('sort_panel', $request->sort);
            
            return redirect()->back();
        }
        
        
    }
    