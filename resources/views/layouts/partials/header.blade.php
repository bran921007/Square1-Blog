<div class="lg:max-w-screen-lg px-5 mx-auto mb-10">
      <!-- header -->
      <header class="flex items-center justify-between py-5">
        <a href="{{route('home')}}" class="px-2 lg:px-0 font-bold">
         <span class="text-xl  font-semibold uppercase tracking-wide">S1 Blog</span>
      </a>
     
      <ul class="hidden md:inline-flex items-center">
          <li class="px-2 md:px-4">
            <a href="{{route('home')}}" class="text-gray-800 font-semibold no-underline hover:underline"> Home </a>
        </li>
        @guest
        <li class="px-2 md:px-4 hidden md:block">
            <a href="{{route('login')}}" class="text-gray-500 font-semibold no-underline hover:underline"> Login </a>
        </li>
        <li class="px-2 md:px-4 hidden md:block">
            <a href="{{route('register')}}" class="text-gray-500 font-semibold no-underline hover:underline"> Register </a>
        </li>
        @else
        <li class="px-2 md:px-4 hidden md:block">
            <a href="{{route('dashboard')}}" class="text-gray-500 font-semibold no-underline hover:underline"> Manage Posts </a>
        </li>
        @endguest
    </ul>

    </header>
    <!-- End header -->
  </div>