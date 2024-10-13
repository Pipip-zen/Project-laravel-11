<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="relative my-4 mx-4">
        <x-search></x-search>
    </div>
    <div class="flex justify-center">
        @if(request()->has('category') || request()->has('author'))
            <div class="mb-2">
                <h1 class="text-2xl font-semibold tracking-wide text-gray-800 dark:text-white lg:text-3xl bg-gray-100 dark:bg-gray-800 rounded-lg p-2">
                    {{ $title }}
                    ({{ $posts->total() }} postingan)
                </h1>
            </div>
        @endif
    </div>
        <div class="my-4 py-4 px-4 mx-auto max-w-screen-xl lg:py-8 lg:px-0 ">
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

                

                @forelse ($posts as $post)
    
                <section class="bg-white dark:bg-gray-900">
                    <div class="container px-6 py-10 mx-auto">
                
                            <div>
                                <img class="object-cover object-center w-full h-64 rounded-lg lg:h-80" src="{{ asset('storage/' . $post->image) }}" alt="">
                
                                <div class="mt-8">
                                    <div class="flex justify-between items-center mb-5 text-gray-500">
                                        <a href="/posts?category={{ $post->category->slug }}" class="text-base text-gray-500  hover:underline">
                                            <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                                {{ $post->category->name }}
                                            </span>
                                        </a>
                                    </div>
                
                                    <a href="/posts/{{ $post->slug }}" class="mt-4 text-xl font-semibold text-gray-800 dark:text-white">
                                        {{ $post->title }}
                                    </a>
                
                                    <p class="mt-2 text-gray-500 dark:text-gray-400">
                                        {{ Str::limit(htmlspecialchars_decode($post['body']), 100) }}
                                    </p>
                
                                    <div class="flex items-center justify-between mt-4">
                                        <div>
                                            <a href="/posts?author={{ $post->author->username }}" class="text-lg font-medium text-gray-700 dark:text-gray-300 hover:underline hover:text-gray-500">
                                                {{ $post->author->name }}
                                            </a>
                
                                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                                        </div>
                
                                        <a href="/posts/{{ $post->slug }}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline text-sm">
                                            Read more
                                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
            
                        </div>
                    </section>
                    @empty
                    <div>
                        <p class="font-semibold text-xl my-4">Article Not Found!</p>
                        <a href="/posts" class="block text-blue-600 hover:underline">&laquo; Back to all posts</a>
                    </div> 
                    @endforelse

                </div>  
            </div>



            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $posts->links() }}
            </div>


</x-layout>
