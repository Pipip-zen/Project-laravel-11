<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">

                    <address class="flex items-center my-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <div>
                                <a href="/posts?author={{ $post->author->username  }}" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                                <p class="text-base text-gray-500 dark:text-gray-400 mb-1">{{ $post->created_at->diffForHumans() }}</p>
                                <a href="/posts?category={{ $post->category->slug }}" class="text-base text-gray-500  hover:underline">
                                    <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                        {{ $post->category->name }}
                                    </span>
                                </a>
                            </div>
                            
                        </div>
                    </address>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="">
                    <h1 class="my-2 mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $post->title }}</h1>
                </header>
                <p>{{$post->body}}</p>
                <a href="/posts" class="font-medium text-sm text-blue-600 hover:underline">
                    &laquo; Back to all posts</a>
            </article>
        </div>
    </main>

    {{-- <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <div class="lg:flex lg:-mx-6">
                <div class="lg:w-3/4 lg:px-6">
                    <img class="object-cover object-center w-full h-80 xl:h-[28rem] rounded-xl" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
    
                    <div>
                        <p class="mt-6 text-sm text-blue-500 uppercase">Want to know</p>
    
                        <h1 class="max-w-lg mt-4 text-2xl font-semibold leading-tight text-gray-800 dark:text-white">
                            What do you want to know about UI
                        </h1>
    
                        <div class="flex items-center mt-6">
                            <img class="object-cover object-center w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1531590878845-12627191e687?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80" alt="">
    
                            <div class="mx-4">
                                <h1 class="text-sm text-gray-700 dark:text-gray-200">Amelia. Anderson</h1>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Lead Developer</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="mt-8 lg:w-1/4 lg:mt-0 lg:px-6">
                    <div>
                        <h3 class="text-blue-500 capitalize">Design instument</h3>
    
                        <a href="#" class="block mt-2 font-medium text-gray-700 hover:underline hover:text-gray-500 dark:text-gray-400 ">
                            How to raise $100k+ by using blox ui kit on your design
                        </a>
                    </div>
    
                    <hr class="my-6 border-gray-200 dark:border-gray-700">
    
                    <div>
                        <h3 class="text-blue-500 capitalize">UI Resource</h3>
    
                        <a href="#" class="block mt-2 font-medium text-gray-700 hover:underline hover:text-gray-500 dark:text-gray-400 ">
                            Should you creat UI Product by using Blox?
                        </a>
                    </div>
    
                    <hr class="my-6 border-gray-200 dark:border-gray-700">
    
                    <div>
                        <h3 class="text-blue-500 capitalize">Premium Collection</h3>
    
                        <a href="#" class="block mt-2 font-medium text-gray-700 hover:underline hover:text-gray-500 dark:text-gray-400 ">
                            Top 10 Blocks you can get on Blox's collection.
                        </a>
                    </div>
    
                    <hr class="my-6 border-gray-200 dark:border-gray-700">
    
                    <div>
                        <h3 class="text-blue-500 capitalize">Premium kits</h3>
    
                        <a href="#" class="block mt-2 font-medium text-gray-700 hover:underline hover:text-gray-500 dark:text-gray-400 ">
                            Top 10 Ui kit you can get on Blox's collection.
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
     --}}

    

</x-layout>

