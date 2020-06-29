@extends('layouts.app')

@section('content')


<main>
  <div class="container mx-auto px-5 lg:max-w-screen-lg mt-20">
    
    <x-alert/>
    <x-error/>

  <div class="flex flex-col">
    

      <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
        	<div class="px-4 py-4 sm:px-6 bg-white">
              <h3 class="text-lg leading-6 font-medium text-gray-900">
                My Posts
              </h3>
             <div class="sm:flex sm:flex-row-reverse ">
               <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:mt-0 sm:w-auto">
              <a href="{{route('post.create')}}" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-300 focus:shadow-outline transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                Publish
              </a>
            </span>
             </div>
            </div>

          <table class="min-w-full">
            <thead>
              <tr>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                  Title
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
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
                  <div class="text-sm leading-5 font-medium text-gray-900">{{$post->publication_date->format('Y-m-d')}}</div>
                </td>


                <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                <a href="{{route('post',$post->slug)}}" class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">Show</a>
                </td>
              </tr>
               @endforeach
             
           
            </tbody>
          </table>
    
        </div>
        {{ $posts->links() }}
      </div>
    </div>
</div>
        </main>

@endsection

