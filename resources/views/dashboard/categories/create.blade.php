@extends('dashboard.layout.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create new category</h1>
</div>

    <div class="relative p-4 w-full h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal body -->
            <form action="/dashboard/categories" method="POST">
                @csrf
                <div class="grid gap-4 mb-4 w-full">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Title</label>
                        <input type="text" name="name" id="name" class="peer bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('name') border-red-500 @enderror" placeholder="Type category name"  autofocus value="{{ old('name') }}">
                        @error('name')
                        <p class="mt-2 peer-invalid:visible text-red-600 text-sm">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div>
                        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Slug</label>
                        <input type="text" name="slug" id="slug" class="peer bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('slug') border-red-500 @enderror" placeholder="Category slug" readonly required value="{{ old('slug') }}">
                        @error('slug')
                        <p class="mt-2 peer-invalid:visible text-red-600 text-sm">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                <div class="items-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                    <a href="/dashboard/categories" data-drawer-target="drawer-read-product-advanced" data-drawer-show="drawer-read-product-advanced" aria-controls="drawer-read-product-advanced" class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        &laquo; Back to dashboard
                    </a>
                    <button type="submit" class="w-full sm:w-auto justify-center text-white inline-flex bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Add category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');

    nameInput.addEventListener('input', () => {
        const title = nameInput.value;
        const slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-');
        slugInput.value = slug;
    });

    ClassicEditor.create(document.querySelector('#body'), {
    entities: 'raw',
    })

    .catch(error => {
        console.error(error);
    });

    function previewImage () {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function(OfREvent) {
            imgPreview.src = OfREvent.target.result;
        }
    }



</script>
@endsection

