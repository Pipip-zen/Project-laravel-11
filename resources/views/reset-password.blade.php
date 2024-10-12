<x-layout>
    <x-slot:title>Reset Password</x-slot>
    
    <div class="max-w-md mx-auto mt-10">
        <h2 class="text-2xl font-bold text-center">Ubah Password</h2>
        
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="username" value="{{ $user->username }}">
            
            <div class="mt-4">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Password Baru</label>
                <input type="password" name="password" id="password" required class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:text-gray-300" placeholder="Masukkan Password Baru">
                @error('password')
                <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mt-4">
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:text-gray-300" placeholder="Konfirmasi Password Baru">
                @error('password_confirmation')
                <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mt-6">
                <button type="submit" class="w-full px-6 py-3 text-sm font-medium text-white bg-gray-800 rounded-lg hover:bg-gray-700">
                    Ubah Password
                </button>
            </div>
        </form>
    </div>
</x-layout>