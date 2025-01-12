<x-guest-layout>
    <h2 class="text-2xl font-semibold text-center text-gray-800 dark:text-gray-200 mb-4">Admin Register</h2>
    <form method="POST" action="{{ route('admin.register-admin') }}">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 dark:bg-gray-700 dark:text-gray-200">
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 dark:bg-gray-700 dark:text-gray-200">
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
            <input id="password" type="password" name="password" required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 dark:bg-gray-700 dark:text-gray-200">
        </div>

        <!-- Confirm Password -->
        <div class="mb-6">
            <label for="password_confirmation"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 dark:bg-gray-700 dark:text-gray-200">
        </div>

        <div class="flex items-center justify-between mb-4">
            <a href="{{route('admin.login-admin')}}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">Already have an account?</a>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-center">
            <button type="submit"
                class="w-full px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 dark:bg-indigo-500 dark:hover:bg-indigo-600 dark:text-gray-100">
                Register
            </button>
        </div>
    </form>
    
</x-guest-layout>
