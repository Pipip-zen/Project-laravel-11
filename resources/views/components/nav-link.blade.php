@props(['active' => false])

<a {{ $attributes }} class="{{ $active ? 'bg-blue-700 text-white' : 'text-gray-600 hover:bg-blue-500 hover:text-white' }} rounded-md px-3 py-2 mx-2 text-sm font-medium" aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>