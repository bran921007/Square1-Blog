@extends('layouts.app')

@section('content')
@extends('admin.partials.header')
<div class="container mx-auto px-5 lg:max-w-screen-md mt-20 flex items-center justify-center">
  <div class="max-w-md w-full">
  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('login') }}">
    <h3 class="text-2xl text-center">Sign In</h3>
    @csrf
    <div class="mb-4">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
           {{ __('Email Address') }}
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('email') border-red-500 @enderror border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
      @error('email')
      <p class="text-red-500 text-xs italic">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
          {{ __('Password') }}
      </label>
      <input class="ppearance-none block w-full bg-gray-200 text-gray-700 border @error('password') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="password" name="password" type="password" id="password" type="password" name="password" required autocomplete="current-password" placeholder="*******">
      @error('password')
      <p class="text-red-500 text-xs italic">{{ $message }}</p>
      @enderror                                
    </div>
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"  type="submit">
         {{ __('Login') }}
      </button>
      <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">
        Forgot Password?
      </a>
    </div>
  </form>
 </div>  
</div>


@endsection
