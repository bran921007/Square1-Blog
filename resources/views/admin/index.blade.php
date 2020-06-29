@extends('layouts.app')

@section('title', 'Dashboard')
@section('body', 'antialiased font-sans bg-gray-100')

@section('content')
@include('admin.partials.header')


<main>
    <div class="container mx-auto px-5 lg:max-w-screen-lg mt-20 mb-10">

        @if (session('status'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mb-4"
            role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="flex flex-col">

            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <div class="px-4 py-4 sm:px-6 bg-white">
                        <div class="flex items-center justify-end  top-auto">

                            <div class="mr-auto">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    My Posts
                                </h3>
                            </div>
                            <div class="">
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:mt-0 sm:w-auto">
                                    <a href="{{route('post.create')}}" type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-300 focus:shadow-outline transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Publish Post
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="mt-1 flex items-center ">
                            <form class="ml-auto" action="{{ route('order.panel')}}" method="post">
                                @csrf
                                <select
                                    class=" sm:text-sm sm:leading-5 w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 rounded focus:outline-none focus:shadow-outline"
                                    name="sort" id="" onchange='if(this.value != 0) { this.form.submit(); }'>
                                    <option value="0">Filter by Publication Date</option>
                                    <option value="asc" {{ session()->get('sort_panel') == 'asc' ? 'selected' : '' }}>
                                        Oldest
                                        Posts</option>
                                    <option value="desc" {{ session()->get('sort_panel') == 'desc' ? 'selected' : '' }}>
                                        Lastest Posts</option>
                                </select>
                            </form>
                        </div>
                    </div>

                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Title
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Publication Date
                                </th>

                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($posts as $post)

                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 font-medium text-gray-900">{{$post->title}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 font-medium text-gray-900">
                                        {{$post->publication_date->format('M d, Y')}}</div>
                                </td>


                                <td
                                    class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                    <a href="{{route('post',$post->slug)}}"
                                        class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">Show</a>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <div class=" px-4 py-4 sm:px-6 bg-white">
                        {{ $posts->links() }}
                    </div>
                </div>

            </div>

        </div>
    </div>
</main>

@endsection
