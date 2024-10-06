@extends('dashboard.layout.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create new post</h1>
</div>

    <div class="relative p-4 w-full h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal body -->
            <form action="/dashboard/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 w-full">
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Title</label>
                        <input type="text" name="title" id="title" class="peer bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('title') border-red-500 @enderror" placeholder="Type post title"  autofocus value="{{ old('title') }}">
                        @error('title')
                        <p class="mt-2 peer-invalid:visible text-red-600 text-sm">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div>
                        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Slug</label>
                        <input type="text" name="slug" id="slug" class="peer bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('slug') border-red-500 @enderror" placeholder="Post slug" readonly required value="{{ old('slug') }}">
                        @error('slug')
                        <p class="mt-2 peer-invalid:visible text-red-600 text-sm">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @foreach ($categories as $category )
                                @if (old('category_id') == $category->id)
                                <option value="{{ $category->id }}" selected> {{ $category->name }}</option>  
                                @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach  
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="body" name="body" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            {{ old('body') }}
                        </textarea>
                        @error('body')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                {{-- <div class="mb-4">
                    <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Images</span>
                    <div class="flex justify-center items-center w-full">
                        <label for="image" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                    <span class="font-semibold">Click to upload</span>
                                    or drag and drop
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input name="image" id="image" type="file" class="hidden">
                        </label>
                    </div>
                </div> --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Post Image</label>
                    <input name="image" id="image"  class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 form-control" type="file">
                </div>
                <div class="items-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                    <a href="/dashboard/posts" data-drawer-target="drawer-read-product-advanced" data-drawer-show="drawer-read-product-advanced" aria-controls="drawer-read-product-advanced" class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        &laquo; Back to dashboard
                    </a>
                    <button type="submit" class="w-full sm:w-auto justify-center text-white inline-flex bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Add post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');

    titleInput.addEventListener('input', () => {
        const title = titleInput.value;
        const slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-');
        slugInput.value = slug;
    });

    ClassicEditor.create(document.querySelector('#body'), {
    entities: 'raw',
})
    .catch(error => {
        console.error(error);
    });
</script>
@endsection

