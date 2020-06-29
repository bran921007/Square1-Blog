@extends('layouts.app')

@section('content')
<div class="container mx-auto px-5 lg:max-w-screen-md mt-20 flex items-center justify-center">
  <div class="max-w-md w-full">
  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('password.update') }}">
    <h3 class="text-2xl text-center">{{ __('Reset Password') }}</h3>
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="mb-4">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
           {{ __('Email Address') }}
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('email') border-red-500 @enderror border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus value="{{ $email ?? old('email') }}">
      @error('email')
      <p class="text-red-500 text-xs italic">{{ $message }}</p>
      @enderror
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                    {{ __('Password') }}
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('password') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="password" name="password" type="password" required autocomplete="new-password" placeholder="Enter Password">
                @error('password')
                 <p class="text-red-500 text-xs italic">{{ $message }}</p>
                 @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password-confirm">
                {{ __('Confirm Password') }}
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>
            </div>
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"  type="submit">
          {{ __('Reset Password') }}
      </button>
    </div>
  </form>
 </div>  
</div>


@endsection
