<div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                Content
                            </th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                Created At
                            </th>
                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                        @foreach($articles as $article)
                            <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                    {{ $article->title }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                    {{ Str::limit($article->content, 50) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                    {{ $article->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                    <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400 dark:focus:text-red-400">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex justify-end mt-6">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>