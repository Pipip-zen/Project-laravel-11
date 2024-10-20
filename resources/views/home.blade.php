<x-layout>
    <x-slot:title>{{ $title }}</x-slot>


    <div id="default-carousel" class="relative w-full max-w-4xl mx-auto mt-20" data-carousel="slide" style="background-color: transparent;">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            @foreach ($posts->take(4) as $post)
            <!-- Item -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <a href="/posts/{{ $post->slug }}">
                    <img src="{{ asset('storage/' . $post->image) }}" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{ $post->title }}">
                    <div class="absolute bottom-10 left-0 right-0 p-4 bg-black bg-opacity-50 text-white">
                        <h2 class="text-lg font-bold">{{ Str::limit($post->title, 75) }}</h2>
                        <p class="text-sm">{!! Str::limit($post->body, 100) !!}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-2 left-1/2 space-x-3 rtl:space-x-reverse">
            @foreach ($posts->take(4) as $index => $post)
            <button type="button" class="w-3 h-3 rounded-full" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
            @endforeach
        </div>
        
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <div class="flex justify-between items-start mb-4">
                <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">Latest Post</h1>
                <a href="/posts" class="text-blue-500 hover:underline">Lihat Semua</a>
            </div>
    
            <div class="swiper-container overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach ($posts->take(10) as $post)
                    <div class="swiper-slide">
                        <div class="relative z-10">
                            <a href="/posts/{{ $post->slug }}">
                                <img class="relative z-10 object-cover w-full rounded-md h-96 transition duration-500 ease-in-out transform hover:scale-105" src="{{ asset('storage/' . $post->image) }}" alt="">
                            </a>
                            <div class="relative z-20 max-w-lg p-6 mx-auto -mt-20 bg-white rounded-md shadow dark:bg-gray-900">
                                <a href="/posts/{{ $post->slug }}" class="font-semibold text-gray-800 hover:underline dark:text-white md:text-xl">
                                    {{ Str::limit($post->title, 50) }}
                                </a>
                                <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 md:text-sm">
                                    {!! Str::limit($post->body, 100) !!}
                                </p>
                                <p class="mt-3 text-sm text-blue-500">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script>
        const swiper = new Swiper('.swiper-container', {
            slidesPerView: 1, 
            spaceBetween: 50, 
            breakpoints: {
                480: {
                    slidesPerView: 1, 
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 4, 
                },
            },
        });
    </script>
</x-layout>