<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('This is the title of articles') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="flex items-center justify-center bg-gray-100 dark:bg-gray-900 min-h-screen">
            <div class="max-w-4xl w-full sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg overflow-hidden">
                    <img src="https://picsum.photos/1920/1200" alt="Article Image" class="w-[800px] h-[400px] object-cover">
                    <div class="p-6">
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">The title of the article</h1>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                            By <span class="font-medium text-gray-800 dark:text-gray-200">Author Name</span> - 
                            <span>January 10, 2025</span>
                        </p>
                        <div class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. 
                                Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.
                            </p>
                            <p class="mt-2">
                                Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi.
                                Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
