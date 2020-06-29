@extends('layouts.app')

@section('title', 'Home')

@section('content')
@include('layouts.partials.header')



<div class="container mx-auto px-5 lg:max-w-screen-md ">

  <div class="mb-5 flex items-center ">
      <form class="ml-auto" action="{{ route('order')}}" method="post">
     @csrf
      <select class="   bg-white border border-gray-400 hover:border-gray-500 px-4 py-3 rounded focus:outline-none focus:shadow-outline" name="sort" id="" onchange='if(this.value != 0) { this.form.submit(); }'>
        <option value="0">Filter by Publication Date</option>
        <option value="asc" {{ session()->get('sort') == 'asc' ? 'selected' : '' }}>Oldest Posts</option>
        <option value="desc" {{ session()->get('sort') == 'desc' ? 'selected' : '' }}>Lastest Posts</option>
      </select>
     </form>
  </div>

          @foreach($posts as $post)
           <a class="block border mb-10 p-5 rounded" href="{{route('post', $post->slug)}}">
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
   <div class="mb-5">
     {{ $posts->links() }}
   </div>
</div>


@endsection