@extends('layouts.app')

@section('title', $post->title)

@section('content')
@include('layouts.partials.header')
<div class="container mx-auto px-5 lg:max-w-screen-md mt-20">
    <h1 class="mb-3 font-bold text-4xl">{{$post->title}}</h1>
    <span class="flex items-center text-sm text-light">{{$post->publication_date->format('M d, Y')}} | by
        {{$post->author->name}}</span>
    <p class="mt-5 leading-loose ">{{$post->description}}</p>
</div>
@endsection
