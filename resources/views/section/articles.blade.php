<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="flex items-center justify-center bg-gray-100 dark:bg-gray-900 min-h-screen">
            <div class="max-w-4xl w-full sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg overflow-hidden">
                    <!-- Full Width Image -->
                    <div class="w-full h-[400px]">
                        <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                    </div>
                
                    <!-- Content Section -->
                    <div class="p-6">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $article->title }}</h1>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                            By <span class="font-medium text-gray-800 dark:text-gray-200">{{ $article->author }}</span> - 
                            <span>{{ $article->created_at->format('F j, Y') }}</span>
                        </p>
                        <div class="mt-6 text-gray-700 dark:text-gray-300 leading-relaxed">
                            {!! nl2br(e($article->content)) !!}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>