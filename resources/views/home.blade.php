<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <x-heros></x-heros>

    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <div class="text-center">
                <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">Latest Post</h1>
    
                <p class="max-w-lg mx-auto mt-4 text-gray-500">
                    Menghadirkan berita-berita aktual dan faktual untuk disajikan setiap harinya kepada seluruh warga PENS
                </p>
            </div>
    
            <div class="grid grid-cols-1 gap-8 mt-8 lg:grid-cols-2">
                @foreach ($posts->take(6) as $post)
                <div class="relative z-10" style="overflow: hidden;">
                    <img class="relative z-10 object-cover w-full rounded-md h-96 transition duration-500 ease-in-out transform hover:scale-105" src="{{ asset('storage/' . $post->image) }}" alt="">
                
                    <div class="relative z-20 max-w-lg p-6 mx-auto -mt-20 bg-white rounded-md shadow dark:bg-gray-900">
                        <a href="/posts/{{ $post->slug }}" class="font-semibold text-gray-800 hover:underline dark:text-white md:text-xl">
                            {{ $post->title }}
                        </a>
                
                        <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 md:text-sm">
                            {{ Str::limit($post->body, 100) }}
                        </p>
                
                        <p class="mt-3 text-sm text-blue-500">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</x-layout>