<x-guest-layout>
    <div class="min-h-full flex items-center justify-center bg-gray-100 dark:bg-gray-900 p-4 rounded-md">
        <div class="max-w-md w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
            <!-- Header -->
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Admin Login</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Sign in to your account</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('admin.login-admin') }}">
                @csrf

                <!-- Email Input -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input id="email" name="email" type="email" required
                        class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Enter your email">
                </div>

                <!-- Password Input -->
                <div class="mb-4">
                    <label for="password"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                    <input id="password" name="password" type="password" required
                        class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Enter your password">
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-4">
                    <a href="{{route('admin.register-admin')}}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">Doesnt Have an account? Register Now</a>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 shadow-md">
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
