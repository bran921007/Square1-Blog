<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Post;
use App\User;

class getExternalPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get posts from third party blog platform ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
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
                'publication_date' => $post['publication_date'],
                'slug'            => $post['title'],
                'user_id'         => $admin->id

            ]);
        });
    }
}
