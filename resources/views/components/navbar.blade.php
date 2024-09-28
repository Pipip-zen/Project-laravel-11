<nav x-data="{ isOpen: false }" class="relative bg-white shadow dark:bg-gray-800">
  <div class="container px-6 py-3 mx-auto md:flex">
      <div class="flex items-center justify-between">
          <a href="/">
              <h2>News</h2>
          </a>

          <!-- Mobile menu button -->
          <div class="flex lg:hidden">
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

          <div class="relative">
              <x-search></x-search>
          </div>

          <!-- Action untuk login dan register -->
          <div class="flex items-center">
            <a href="#" class="text-gray-700 hover:text-gray-900 mr-4">Login</a>
            <a href="#" class="text-gray-700 hover:text-gray-900">Register</a>
        </div>
          
      </div>
  </div>
</nav>