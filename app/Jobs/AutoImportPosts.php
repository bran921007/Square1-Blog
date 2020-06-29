<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Post;
use App\User;

class AutoImportPosts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    /**
    * Create a new job instance.
    *
    * @return void
    */
    public function __construct()
    {
        //
    }
    
    /**
    * Execute the job.
    *
    * @return void
    */
    public function handle()
    {
        $json = json_decode(file_get_contents(config('api_blog.external_blog.url')), true);
        
        $newPosts = collect($json['data']);
        
        $newPosts->map(function ($post) {
            
            $admin = User::where('role', 'admin')->firstOrFail();
            
            return Post::firstOrcreate([
                'title'           => $post['title'],
                'description'     => $post['description'],
                'publication_date'=> $post['publication_date'],
                'slug'            => $post['title'],
                'user_id'         => $admin->id
                
                ]);
            });
        }
    }
    