@extends('layouts.app')

@section('title', 'New Blog Post')
@section('body', 'antialiased font-sans bg-gray-100')

@section('content')
@include('admin.partials.header')
<main>
	<div class="container mx-auto px-5 lg:max-w-screen-lg mt-20">
		<div class="bg-white shadow overflow-hidden sm:rounded-lg">
			<div class="px-4 py-5 border-b border-gray-200 sm:px-6">
				<h3 class="text-lg leading-6 font-medium text-gray-900">
					New Post
				</h3>
			</div>
			<div class="max-w-xl mx-auto px-6 py-6">
				<form action="{{route('post.store')}}" method="POST">
					@csrf
					<div class="mb-4">
						<label class="block text-gray-700 text-sm mb-2" for="title">
							Title
						</label>
						<input class="bg-white focus:outline-none focus:shadow-outline border @error('title') border-red-500 @enderror border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" id="title" name="title" type="text" placeholder="Title of Post" value="{{old('title')}}">
						@error('title')
				         <p class="text-red-500 text-xs italic">{{ $message }}</p>
				        @enderror
					</div>
					<div class="mb-4">
						<label class="block text-gray-700 text-sm mb-2" for="description">
							Description
						</label>
						<textarea class="bg-white focus:outline-none focus:shadow-outline border @error('description') border-red-500 @enderror border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal h-40" id="description" name="description" placeholder="Description" >{{old('description')}}</textarea>
						@error('description')
				         <p class="text-red-500 text-xs italic">{{ $message }}</p>
				        @enderror
					</div>
					<div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-gray-100">
						<span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:mt-0 sm:w-auto">
							
							<button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-300 focus:shadow-outline transition ease-in-out duration-150 sm:text-sm sm:leading-5">
								{{-- <a href="#" type="button" > --}}
								Publish
							   {{-- </a> --}}
							</button>

							{{-- <input type="submit"> --}}
						</span>
						{{-- <span class="flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
							<a href="{{route('dashboard')}}" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline transition ease-in-out duration-150 sm:text-sm sm:leading-5">
								Back
							</a>
						</span> --}}
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
@endsection