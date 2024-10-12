<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
  <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
    </div>
      <aside class="flex flex-col w-64 h-screen px-4 py-8 overflow-y-auto bg-white border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700">

        <div class="flex flex-col justify-between flex-1 mt-6">
            <nav>
                <a class="flex items-center px-4 py-2 text-gray-700 bg-gray-100 rounded-md dark:bg-gray-800 dark:text-gray-200 {{ Request::is('dashboard') ? 'bg-black text-white' : '' }}" href="/dashboard">
                  <i class="fa-solid fa-house"></i>

                    <span class="mx-4 font-medium">Dashboard</span>
                </a>

                <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700  {{ Request::is('dashboard/posts*') ? 'bg-black text-white' : '' }}" href="/dashboard/posts">
                  <i class="fa-solid fa-upload"></i>

                    <span class="mx-4 font-medium">My Posts</span>
                </a>

                <hr class="my-6 border-gray-200 dark:border-gray-600" />

                @can('admin')
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                  <span>ADMINISTRATOR</span>
                </h6>
                <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700 {{ Request::is('dashboard/categories*') ? 'bg-black text-white' : '' }}" href="/dashboard/categories">
                  <i class="fa-solid fa-list"></i>

                    <span class="mx-4 font-medium">Post Categories</span>
                </a>
                @endcan

                <form action="/logout" method="POST">
                  @csrf
                <button type="submit" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="#">
                  <i class="fa-solid fa-right-from-bracket"></i>

                    <span class="mx-4 font-medium">Sign Out</span>
                </button>
                </form>
            </nav>

        </div>
      </aside>
    </div>
</div>