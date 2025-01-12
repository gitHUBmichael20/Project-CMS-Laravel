<div class="min-h-screen bg-gray-100 dark:bg-gray-900 py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 min-w-screen">
        
        <div
        class="relative px-4 py-10 bg-white dark:bg-gray-800 mx-8 md:mx-0 shadow-lg rounded-3xl sm:p-10 max-w-4xl lg:mx-auto">
        <div class="mx-auto">
            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    @if (session('success'))
                        <div class="text-green-500 text-center">{{ session('success') }}</div>
                    @endif
            
                    @if ($errors->any())
                        <div class="text-red-500">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-center text-red-600">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="uploadForm" class="py-8 space-y-8" method="POST" action="{{ route('admin.upload-image') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Title -->
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center">Upload Image Form
                        </h1>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300"
                                for="author">Author</label>
                            <input type="text" value="Michael" name="author" id="author"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-400">
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300"
                                for="title">Title</label>
                            <input type="text" placeholder="Write your title" name="title" id="title"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-400">
                        </div>

                        <!-- Image Upload -->
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300"
                                for="image">Image</label>
                            <input type="file" accept="image/*" name="image" id="image"
                                class="w-full text-sm text-gray-500 dark:text-gray-400 
                                    file:mr-4 file:py-3 file:px-6 
                                    file:rounded-full file:border-0 
                                    file:text-sm file:font-semibold
                                    file:bg-blue-50 dark:file:bg-blue-900 
                                    file:text-blue-700 dark:file:text-blue-300 
                                    hover:file:bg-blue-100 dark:hover:file:bg-blue-800
                                    cursor-pointer">
                        </div>

                        <!-- Caption -->
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300"
                                for="caption">Caption</label>
                            <textarea rows="4" name="caption" id="caption"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                    dark:bg-gray-700 dark:text-gray-300
                                    focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-600 dark:focus:border-blue-600"
                                placeholder="Enter image caption..."></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full flex justify-center py-3 px-6 
                                border border-transparent rounded-lg shadow-md 
                                text-base font-medium text-white 
                                bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800 
                                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 
                                dark:focus:ring-offset-gray-800
                                transition-colors duration-200">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        // Check system dark mode preference
        if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.classList.add('dark');
        }

        document.getElementById('imageInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onloadend = function() {
                    document.getElementById('imagePreview').src = reader.result;
                    document.getElementById('previewContainer').classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('uploadForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Handle form submission here
            console.log('Form submitted');
        });
    </script>
</div>
