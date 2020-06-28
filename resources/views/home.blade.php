@extends('layouts.app')

@section('content')
<div class="container mx-auto px-5 lg:max-w-screen-md ">

          @foreach($posts as $post)
           <a class="block border mb-10 p-5 rounded" href="{{route('post',$post->id)}}">
            <div class="flex flex-col justify-between flex-1">
                <div>
                    <div class="font-bold text-2xl mb-2">
                      {{$post->title}}
                   </div>

                   <p class="mb-6 leading-loose">
                     {{$post->description}}
                  </p>
            </div>

            <div class="flex items-center text-sm">
                <span class="ml-2">{{$post->author->name}}</span>
                <span class="ml-auto">{{$post->publication_date}}</span>
            </div>
        </div>
        </a>
        @endforeach

</div>
@endsection