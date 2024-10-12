<x-layout>
    <x-slot:title>Forgot Password</x-slot>
    
    <div class="max-w-md mx-auto mt-10">
        <h2 class="text-2xl font-bold text-center">Reset Password</h2>
        
        <form action="{{ route('password.username') }}" method="POST">
            @csrf
            <div class="mt-4">
                <label for="username" class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Username</label>
                <input type="text" name="username" id="username" required class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:text-gray-300" placeholder="Masukkan Username">
                @error('username')
                <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full px-6 py-3 text-sm font-medium text-white bg-gray-800 rounded-lg hover:bg-gray-700">
                    Kirim
                </button>
            </div>
        </form>
    </div>
</x-layout>