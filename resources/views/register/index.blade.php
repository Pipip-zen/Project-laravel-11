<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-4xl">
        <div class="hidden bg-cover lg:block lg:w-1/2" style="background-image: url('https://images.unsplash.com/photo-1606660265514-358ebbadc80d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1575&q=80');"></div>
    
        <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">

            <p class="mt-3 text-xl text-center text-gray-600 dark:text-gray-200">
                Hello Mate!
            </p>
        
            <div class="flex items-center justify-between mt-4">
            </div>
        
            <form action="/register" method="POST">
                @csrf
        
                <div class="mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="name">Name</label>
                    <input name="name" id="name" placeholder="Name" class="peer block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 @error('name') border-red-500 @enderror" type="text" required value="{{ old('name') }}" />
                    @error('name')
                        <p class="mt-2  peer-invalid:visible text-red-600 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
        
                <div class="mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="username">Username</label>
                    <input name="username" id="username" placeholder="Username" class="peer block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 @error('username') border-red-500 @enderror" type="text" required value="{{ old('username') }}"/>
                    @error('username')
                        <p class="mt-2  peer-invalid:visible text-red-600 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
        
                <div class="mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="email">Email Address</label>
                    <input name="email" id="email" placeholder="name@example.com" class="peer block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 @error('email') border-red-500 @enderror" type="email" required value="{{ old('email') }}"/>
                    @error('email')
                        <p class="mt-2  peer-invalid:visible text-red-600 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
        
                <div class="mt-4">
                    <div class="flex justify-between">
                        <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="loggingPassword">Password</label>
                    </div>
                    <input name="password" id="password" placeholder="Password" class="peer block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 @error('password') border-red-500 @enderror" type="password" required/>
                    @error('password')
                        <p class="mt-2  peer-invalid:visible text-red-600 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
        
                <div class="mt-6">
                    <button class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gray-800 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                        SIGN UP
                    </button>
                </div>
        
                <div class="flex items-center justify-between mt-4">
                    <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>
        
                    <a href="/login" class="text-xs text-gray-500 uppercase dark:text-gray-400 hover:underline">or sign in</a>
        
                    <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>
                </div>
            </form>
        </div>
    </div>
</x-layout>