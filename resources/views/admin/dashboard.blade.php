<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    @vite('resources/css/app.css')
    <title>Panel Admin</title>
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <header
        class="relative flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-white dark:bg-gray-800 text-sm py-3 border-b dark:border-gray-700">
        <nav class="max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between">
            <div class="flex items-center justify-between">
                <a class="flex-none text-xl font-semibold dark:text-white focus:outline-none focus:opacity-80"
                    href="#" aria-label="Brand">
                    <span
                        class="inline-flex items-center gap-x-2 text-xl font-semibold text-gray-800 dark:text-gray-100">
                        <img class="w-10 h-auto" src="{{ asset('assets/logo.png') }}" alt="Logo">
                        Our Blog
                    </span>
                </a>
                <div class="sm:hidden">
                    <button type="button"
                        class="hs-collapse-toggle relative size-7 flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-700 dark:focus:bg-gray-700"
                        id="hs-navbar-example-collapse" aria-expanded="false" aria-controls="hs-navbar-example">
                        <svg class="hs-collapse-open:hidden size-4" width="24" height="24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" x2="21" y1="6" y2="6" />
                            <line x1="3" x2="21" y1="12" y2="12" />
                            <line x1="3" x2="21" y1="18" y2="18" />
                        </svg>
                        <svg class="hs-collapse-open:block hidden size-4" width="24" height="24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="hs-navbar-example"
                class="hidden hs-collapse overflow-hidden transition-all duration-300 basis-full grow sm:block">
                <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
                    <button onclick="showContent('posts')"
                        class="nav-btn font-medium text-blue-600 dark:text-blue-400 focus:outline-none"
                        data-content="posts">Post Content</button>
                    <button onclick="showContent('manage')"
                        class="nav-btn font-medium text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-gray-100 focus:outline-none"
                        data-content="manage">Manage</button>
                    <button onclick="showContent('settings')"
                        class="nav-btn font-medium text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-gray-100 focus:outline-none"
                        data-content="settings">Settings</button>
                </div>
            </div>
        </nav>
    </header>

    <!-- Content Sections -->
    <main class="container mx-auto px-4 py-8">
        <!-- posts Content -->
        <div id="posts-content" class="content-section">
            @include('admin.admin-post')
        </div>

        <!-- Manage Content -->
        <div id="manage-content" class="content-section hidden">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">User Management</h2>
                    @include('admin.admin-manage')
                </div>
            </div>
        </div>

        <!-- Settings Content -->
        <div id="settings-content" class="content-section hidden">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Site Settings</h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 border-b dark:border-gray-700">
                            <div>
                                <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">Dark Mode</h3>
                                <p class="text-gray-600 dark:text-gray-400">Toggle dark mode appearance</p>
                            </div>
                            <button
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Toggle</button>
                        </div>
                        <div class="flex items-center justify-between p-4 border-b dark:border-gray-700">
                            <div>
                                <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">Notifications</h3>
                                <p class="text-gray-600 dark:text-gray-400">Manage notification settings</p>
                            </div>
                            <button
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Configure</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Function to handle content switching
        function showContent(contentId) {
            // Hide all content sections
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.add('hidden');
            });

            // Show selected content
            document.getElementById(`${contentId}-content`).classList.remove('hidden');

            // Update active navigation button
            document.querySelectorAll('.nav-btn').forEach(btn => {
                if (btn.dataset.content === contentId) {
                    btn.classList.remove('text-gray-600', 'dark:text-gray-300');
                    btn.classList.add('text-blue-600', 'dark:text-blue-400');
                } else {
                    btn.classList.remove('text-blue-600', 'dark:text-blue-400');
                    btn.classList.add('text-gray-600', 'dark:text-gray-300');
                }
            });
        }

        // Show posts by default
        document.addEventListener('DOMContentLoaded', () => {
            showContent('posts');
        });
    </script>
</body>

</html>
