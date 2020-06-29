@extends('layouts.blog')

@section('content')

<div class="container">
   
  <form action="{{ route('order')}}" method="post">
     @csrf
      <select name="sort" id="" onchange='if(this.value != 0) { this.form.submit(); }'>
        <option value="0">Filter by Publication Date</option>
        <option value="asc" {{ session()->get('sort') == 'asc' ? 'selected' : '' }}>Newest posts</option>
        <option value="desc" {{ session()->get('sort') == 'desc' ? 'selected' : '' }}>Lastest Posts</option>
      </select>
  {{-- <noscript><input type="submit" value="Submit"></noscript> --}}
  </form>
</div>

<div class="container mx-auto px-5 lg:max-w-screen-md ">

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
   {{ $posts->links() }}
</div>


@endsection