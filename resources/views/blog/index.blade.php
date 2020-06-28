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
<body class="antialiased font-sans bg-gray-100">

<header class="bg-gray-800">
	<div class="lg:max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex items-center justify-between h-16">
			<div class="flex items-center">
				<div class="flex-shrink-0">
            		<a href="{{route('home')}}"><span class="text-white">Blog</span></a>
          		</div>
			</div>
		
		</div>
	</div>
</header>

<main>
  <div class="container mx-auto px-5 lg:max-w-screen-lg mt-20">

  <div class="flex flex-col">

      <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
        	<div class="px-4 py-4 border-b border-gray-200 sm:px-6 bg-white">
              <h3 class="text-lg leading-6 font-medium text-gray-900">
                My Posts
              </h3>

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
              <tr>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                  <div class="text-sm leading-5 font-medium text-gray-900">How to Start a Blog with TailwindCSS</div>
                </td> 
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                  <div class="text-sm leading-5 font-medium text-gray-900">2020-06-28</div>
                </td>


                <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                <a href="#" class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">Show</a>
                </td>
              </tr>
      
             
           
            </tbody>
          </table>
    
        </div>
      </div>
    </div>
</div>
        </main>

</body>
</html>
