@extends('layouts.app')

@section('content')
@extends('admin.partials.header')
<div class="container mx-auto px-5 lg:max-w-screen-md mt-20 flex items-center justify-center">
	<div class="max-w-md w-full">

		<form form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('register') }}">
			<h3 class=" text-2xl text-center">Create an Account!</h3>
			@csrf
			 <div class="flex flex-wrap -mx-3 mb-6">
				<div class="w-full px-3">
				  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
					{{ __('Name') }}
				  </label>
				  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('name') border-red-500 @enderror border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
				  @error('name')
				 <p class="text-red-500 text-xs italic">{{ $message }}</p>
				 @enderror
				</div>
			  </div>

				<div class="flex flex-wrap -mx-3 mb-6">
				<div class="w-full px-3">
				  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
				   {{ __('Email Address') }}
				  </label>
				  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('email') border-red-500 @enderror border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
				 @error('email')
				 <p class="text-red-500 text-xs italic">{{ $message }}</p>
				 @enderror
				</div>
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

			<div class="mb-6 text-center">
				<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full"  type="submit">
			        {{ __('Register') }}
			    </button>
			</div>

			<hr class="mb-6 border-t" />
			<div class="text-center">
				<a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800" href="{{route('login')}}">
				Already have an account? Login!</a>
		    </div>
			<div class="text-center">
				<a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800" href="{{route('password.request')}}">
				 Forgot Password? </a>
		    </div>
		</form>
	</div>
</div>

@endsection
