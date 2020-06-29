<?php

use App\Post;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

// uses(RefreshDatabase::class);

test('Guest can register', function () {

    $response = $this->post(route('register'), [
        'name' => 'Erica',
        'name' => 'Hernandez',
        'email' => 'erica@gmail.com',
        'password' => '123456',
        'password_confirmation' => '123456',
    ]);

    $response->assertRedirect(route('home'));
});

test('User can login in their account', function () {

    $user = factory(User::class)->create(['password' => \Hash::make('123456')]);

    $response = $this->post(route('login'), [
        'email' => $user->email,
        'password' => '123456'
    ]);

    $response->assertRedirect(route('home'));
    $this->assertAuthenticatedAs($user);
});