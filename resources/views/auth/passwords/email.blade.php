@extends('layouts.app')

@section('content')
@include('admin.partials.header')
<div class="container mx-auto px-5 lg:max-w-screen-md mt-20 flex items-center justify-center">
  <div class="max-w-md w-full">
  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('password.email') }}">
    <h3 class="text-2xl text-center">{{ __('Reset Password') }}</h3>
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

    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"  type="submit">
         {{ __('Send Password Reset Link') }}
      </button>

    </div>
  </form>
 </div>  
</div>


@endsection
