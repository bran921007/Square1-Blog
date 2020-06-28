<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Blog') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

  <div class="lg:max-w-screen-lg px-5 mx-auto mb-10">
      <!-- header -->
      <header class="flex items-center justify-between py-5">
        <a href="{{route('home')}}" class="px-2 lg:px-0 font-bold">
         <span class="font-semibold text-xl tracking-tight">S1 Blog</span>
      </a>
     
      <ul class="hidden md:inline-flex items-center">
          <li class="px-2 md:px-4">
            <a href="{{route('home')}}" class="text-gray-800 font-semibold no-underline hover:underline"> Home </a>
        </li>
        @auth
             <li class="px-2 md:px-4 hidden md:block">
            <a href="{{route('login')}}" class="text-gray-500 font-semibold no-underline hover:underline"> {{auth()->user()->full_name}} </a>
        </li>
        @else
          <li class="px-2 md:px-4 hidden md:block">
            <a href="{{route('login')}}" class="text-gray-500 font-semibold no-underline hover:underline"> Login </a>
        </li>
        <li class="px-2 md:px-4 hidden md:block">
            <a href="{{route('register')}}" class="text-gray-500 font-semibold no-underline hover:underline"> Register </a>
        </li>

        @endauth
        
    </ul>

    </header>
    <!-- End header -->
  </div>


    @yield('content')

</body>
</html>
