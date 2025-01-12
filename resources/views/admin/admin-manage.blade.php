<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Article Management</h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Manage your articles and content</p>
        </div>

        <!-- Search and Sort Controls -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-6">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- Search Bar -->
                <form method="GET" action="{{ route('admin.admin.admin-manage') }}" class="flex gap-2">
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        placeholder="Search articles...">
                    <button type="submit"
                        class="inline-flex justify-center items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Search
                    </button>
                </form>

                <!-- Sorting -->
                <form method="GET" action="{{ route('admin.admin.admin-manage') }}" class="flex gap-2">
                    <select name="sort_by"
                        class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <option value="title" {{ request('sort_by') == 'title' ? 'selected' : '' }}>Title</option>
                        <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Created At
                        </option>
                    </select>
                    <select name="sort_order"
                        class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Ascending</option>
                        <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Descending
                        </option>
                    </select>
                    <button type="submit"
                        class="inline-flex justify-center items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Sort
                    </button>
                </form>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Title</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Content</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Created At</th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($articles as $article)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $article->title }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                    {{ Str::limit($article->content, 100) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $article->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button
                                        onclick="openEditModal(
        {{ $article->id }}, 
        '{{ addslashes($article->title) }}', 
        '{{ addslashes($article->content) }}', 
        '{{ addslashes($article->author) }}',
        '{{ $article->image }}'
    )"
                                        class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-4">
                                        Edit
                                    </button>
                                    <form class="inline-block" method="POST"
                                        action="{{ route('admin.articles.delete', $article->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="bg-white dark:bg-gray-800 px-4 py-3 border-t border-gray-200 dark:border-gray-700 sm:px-6">
                {{ $articles->appends(request()->all())->links() }}
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- Modal panel -->
            <div
                class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form method="POST" action="{{ route('admin.articles.update') }}" class="p-6"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" id="edit-id" name="id">

                    <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white mb-4">Edit Article</h3>

                    <div class="space-y-4">

                        <!-- Title Field -->
                        <div>
                            <label for="edit-title"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                            <input type="text" id="edit-title" name="title"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                required>
                        </div>

                        <!-- Caption Field -->
                        <div>
                            <label for="edit-caption"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Caption</label>
                            <textarea id="edit-caption" name="content" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                required></textarea>
                        </div>

                        <!-- Author Field -->
                        <div>
                            <label for="edit-author"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Author</label>
                            <input type="text" id="edit-author" name="author"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                required>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-3">
                        <button type="button" onclick="closeEditModal()"
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600">
                            Cancel
                        </button>
                        <button type="submit"
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
    function openEditModal(id, title, caption, author) {
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-title').value = title;
        document.getElementById('edit-caption').value = caption;
        document.getElementById('edit-author').value = author;

        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    // Preview new image when selected
    document.getElementById('edit-image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewImage = document.getElementById('preview-image');
                previewImage.src = e.target.result;
                previewImage.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
