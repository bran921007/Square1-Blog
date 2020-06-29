<?php

use App\Post;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('has welcome page')->get('/')->assertStatus(200);

test('User can create a posts', function () {
    $user = factory(App\User::class)->create();
    $this->actingAs($user);

    $post = new Post([
        'title' => 'ValdaBakery',
        'slug'  => 'ValdaBakery',
        'description' =>  'Lorem Ipsum',
        'publication_date' => now(),
    ]);
    $user->posts()->save($post);

    $this->assertDatabaseHas('posts', [
        'title' => 'ValdaBakery'
    ]);
});

test('User cannot see post from other users in their admin panel', function () {
    $user = factory(App\User::class)
        ->create(['role' => 'user']);

    $randomPost = factory(Post::class)->create();

    $response = $this->actingAs($user)
        ->get('panel/home')
        ->assertStatus(200)
        ->assertDontSee($randomPost->title);
});
