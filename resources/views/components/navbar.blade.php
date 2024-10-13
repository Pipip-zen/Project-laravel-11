<nav x-data="{ isOpen: false }" class="relative bg-white shadow dark:bg-gray-800">
  <div class="container px-6 py-3 mx-auto md:flex">
      <div class="flex items-center justify-between">
          <a href="/">
              <h2>ENT News</h2>
          </a>

          <!-- Mobile menu button -->
          <div class="flex md:hidden">
            <button x-cloak @click="isOpen = !isOpen" type="button" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
              <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
              </svg>
          
              <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
      </div>

      <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
      <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']" class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white dark:bg-gray-800 md:mt-0 md:p-0 md:top-0 md:relative md:opacity-100 md:translate-x-0 md:flex md:items-center md:justify-between">
          <div class="flex flex-col px-2-mx-4 md:flex-row md:mx-10 md:py-0">
            <x-nav-link href="/" :active="request()-> is('/')">Home</x-nav-link>
            <x-nav-link href="/posts" :active="request()-> is('posts')">Blog</x-nav-link>
          </div>
          
          
          
        <div class="flex items-center">
        @auth
        <div x-data="{ isOpen: false }" class="relative inline-block ">
            <!-- Dropdown toggle button -->
            <button @click="isOpen = !isOpen" class="relative z-10 flex items-center p-2 text-sm text-gray-600 bg-white border border-transparent rounded-md focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring dark:text-white dark:bg-gray-800 focus:outline-none">
                <span class="mx-1">Welcome, {{ auth()->user()->username }}</span>
                <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z" fill="currentColor"></path>
                </svg>
            </button>
                
            <!-- Dropdown menu -->
            <div x-show="isOpen" 
                @click.away="isOpen = false"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
                class="absolute right-0 z-20 w-56 py-2 mt-2 overflow-hidden origin-top-right bg-white rounded-md shadow-xl dark:bg-gray-800"
            >
                <a href="#" class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                    <div class="mx-1">
                        <h1 class="text-sm font-semibold text-gray-700 dark:text-gray-200">{{ auth()->user()->name }}</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</p>
                    </div>
                </a>
        
                <hr class="border-gray-200 dark:border-gray-700 ">
        
                <a href="/dashboard" class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                    My Dashboard
                </a>
        
                <hr class="border-gray-200 dark:border-gray-700 ">
                
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                        Sign Out
                    </button>
                </form>
            </div>
        </div>
        @else
       
            

            <x-nav-link href="/login" :active="request()-> is('login')">Login</x-nav-link>
            <x-nav-link href="/register" :active="request()-> is('register')">Register</x-nav-link>

            @endauth
        </div>
        
          <!-- Action untuk login dan register -->

          
      </div>
  </div>
</nav>

