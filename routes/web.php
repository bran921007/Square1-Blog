<?php

use App\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('/order', 'HomeController@sortByPublicationDate')->name('order');
Route::get('/post/{slug}', 'HomeController@getPosts')->name('post');
// Route::get('/home', 'PostController@index')->name('dashboard');
Route::post('/post/store', 'PostController@store')->name('post.store');
Route::group(['middleware' => 'auth','prefix'=>'panel'], function () {

    Route::get('/home', 'PostController@index')->name('dashboard');
    Route::get('/post/create', 'PostController@create')->name('post.create');
    // Route::post('/post/store', 'PostController@store')->name('post.store');

});

Route::get('test',function()
{

    // $url = urlencode (config('api_blog.external_blog.url'));
    

    $json = json_decode(file_get_contents(config('api_blog.external_blog.url')), true);
    
    $newPosts = collect($json['data']);
    // dd($newPosts );
    $newPosts->map(function($post){
        // dd($post);
        $admin = App\User::where('role', 'admin')->firstOrFail();
        
        return App\Post::firstOrcreate([
            'title'           => $post['title'],
            'description'     => $post['description'],
            'publication_date'=> $post['publication_date'],
            'slug'            => $post['title'],
            'user_id'         => $admin->id
            
        ]);
    });

    // App\Post::firstOrCreate($newPosts->toArray()[0]);
    // dd($newPosts);
});
