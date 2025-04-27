<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Game Forum - Community Discussions</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        body {
            background-color: #1a202c;
            color: #e2e8f0;
            font-family: 'Inter', sans-serif;
        }

        .thread-card:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }
    </style>
</head>

<body>
    <!-- Header Navigation -->
    <header class="bg-[#151b27] border-b border-gray-800">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center">
                <a href="/" class="text-2xl font-['Pacifico'] text-primary mr-8">GameHaven</a>
                <nav class="hidden md:flex space-x-6">
                    <a href="/" class="text-gray-400 hover:text-white">Store</a>
                    <a href="#" class="text-gray-400 hover:text-white">Library</a>
                    <a href="#" class="text-gray-400 hover:text-white">Community</a>
                    <a href="#" class="text-primary border-b-2 border-primary pb-1">Forum</a>
                </nav>
            </div>
            <div class="flex items-center space-x-4">
                <div class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-white">
                    <i class="ri-search-line ri-lg"></i>
                </div>
                <div class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-white">
                    <i class="ri-shopping-cart-line ri-lg"></i>
                </div>
                <div class="w-8 h-8 rounded-full bg-gray-700 overflow-hidden">
                    <img src="https://readdy.ai/api/search-image?query=abstract%20gaming%20profile%20avatar%20with%20neon%20blue%20details%2C%20minimalist%20design%2C%20dark%20background&width=100&height=100&seq=1&orientation=squarish"
                        alt="Profile" class="w-full h-full object-cover" />
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Left Content (Forum) -->
            <div class="lg:w-3/4">
                <!-- Forum Header -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    <h1 class="text-2xl font-bold">Community Forum</h1>
                    <div class="flex items-center space-x-4 mt-4 md:mt-0">
                        <div class="relative">
                            <button
                                class="flex items-center space-x-2 bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-button text-sm whitespace-nowrap">
                                <span>Sort: Latest</span>
                                <div class="w-4 h-4 flex items-center justify-center">
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                            </button>
                            <div class="hidden absolute top-full left-0 mt-1 bg-gray-800 rounded shadow-lg z-10 w-40">
                                <a href="#" class="block px-4 py-2 hover:bg-gray-700 text-sm">Latest</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-700 text-sm">Hot</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-700 text-sm">Most Viewed</a>
                            </div>
                        </div>
                        <div class="relative">
                            <button
                                class="flex items-center space-x-2 bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-button text-sm whitespace-nowrap">
                                <span>Filter</span>
                                <div class="w-4 h-4 flex items-center justify-center">
                                    <i class="ri-filter-3-line"></i>
                                </div>
                            </button>
                        </div>
                        <a href="/thread">
                            <button
                                class="bg-purple-500 rounded-sm cursor-pointer hover:bg-purple-600 hover:bg-primary/90 px-4 py-2 rounded-button text-white text-sm whitespace-nowrap">
                                <div class="flex items-center space-x-2">
                                    <div class="w-4 h-4 flex items-center justify-center">
                                        <i class="ri-add-line"></i>
                                    </div>
                                    <span>New Thread</span>
                                </div>
                            </button></a>
                    </div>
                </div>

                <!-- Forum Categories -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    <div class="bg-gray-800/50 rounded p-4 hover:bg-gray-800 transition">
                        <div class="flex items-start">
                            <div class="w-10 h-10 flex items-center justify-center bg-primary/20 rounded-full mr-3">
                                <i class="ri-gamepad-line ri-lg text-primary"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold mb-1">Game Discussion Boards</h3>
                                <p class="text-sm text-gray-400 mb-2">
                                    Discuss your favorite games, strategies, and experiences
                                </p>
                                <div class="flex text-xs text-gray-500">
                                    <span>3.2K threads</span>
                                    <span class="mx-2">•</span>
                                    <span>18.7K posts</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-800/50 rounded p-4 hover:bg-gray-800 transition">
                        <div class="flex items-start">
                            <div class="w-10 h-10 flex items-center justify-center bg-secondary/20 rounded-full mr-3">
                                <i class="ri-discuss-line ri-lg text-secondary"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold mb-1">General Discussion</h3>
                                <p class="text-sm text-gray-400 mb-2">
                                    Chat about gaming news, industry trends, and more
                                </p>
                                <div class="flex text-xs text-gray-500">
                                    <span>1.8K threads</span>
                                    <span class="mx-2">•</span>
                                    <span>9.5K posts</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-800/50 rounded p-4 hover:bg-gray-800 transition">
                        <div class="flex items-start">
                            <div class="w-10 h-10 flex items-center justify-center bg-green-500/20 rounded-full mr-3">
                                <i class="ri-settings-line ri-lg text-green-500"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold mb-1">Technical Support</h3>
                                <p class="text-sm text-gray-400 mb-2">
                                    Get help with game issues, bugs, and technical problems
                                </p>
                                <div class="flex text-xs text-gray-500">
                                    <span>2.4K threads</span>
                                    <span class="mx-2">•</span>
                                    <span>12.1K posts</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-800/50 rounded p-4 hover:bg-gray-800 transition">
                        <div class="flex items-start">
                            <div class="w-10 h-10 flex items-center justify-center bg-yellow-500/20 rounded-full mr-3">
                                <i class="ri-palette-line ri-lg text-yellow-500"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold mb-1">Community Creations</h3>
                                <p class="text-sm text-gray-400 mb-2">
                                    Share your artwork, mods, and other creative projects
                                </p>
                                <div class="flex text-xs text-gray-500">
                                    <span>1.5K threads</span>
                                    <span class="mx-2">•</span>
                                    <span>7.3K posts</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Popular Threads -->
                <div class="mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold">Popular Threads</h2>
                        <a href="#" class="text-primary text-sm hover:underline">View All</a>
                    </div>

                    <!-- Thread List -->
                    <div class="space-y-4">
                        <!-- Thread 1 -->
                        <div class="thread-card bg-gray-800/30 rounded p-4 transition">
                            <div class="flex items-start">
                                <div class="hidden sm:block mr-4">
                                    <div class="w-10 h-10 rounded-full overflow-hidden">
                                        <img src="https://readdy.ai/api/search-image?query=gaming%20profile%20avatar%20with%20cyberpunk%20style%2C%20glowing%20details&width=100&height=100&seq=2&orientation=squarish"
                                            alt="User Avatar" class="w-full h-full object-cover" />
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center mb-1">
                                        <span
                                            class="bg-primary/20 text-primary text-xs px-2 py-0.5 rounded-full mr-2">Cyberpunk
                                            2077</span>
                                        <span
                                            class="bg-gray-700 text-gray-300 text-xs px-2 py-0.5 rounded-full">Guide</span>
                                    </div>
                                    <h3 class="font-semibold mb-1 hover:text-primary">
                                        Ultimate Build Guide for Netrunners in Patch 2.0
                                    </h3>
                                    <p class="text-sm text-gray-400 mb-2 line-clamp-2">
                                        I've spent over 200 hours testing different netrunner builds since the latest
                                        patch, and I've found some incredible synergies that make hacking incredibly
                                        powerful...
                                    </p>
                                    <div class="flex flex-wrap items-center text-xs text-gray-500">
                                        <span>Posted by <a href="#"
                                                class="text-blue-400 hover:underline">NightCityLegend</a></span>
                                        <span class="mx-2">•</span>
                                        <span>2 days ago</span>
                                        <span class="mx-2">•</span>
                                        <div class="flex items-center">
                                            <div class="w-4 h-4 flex items-center justify-center mr-1">
                                                <i class="ri-message-3-line"></i>
                                            </div>
                                            <span>128 replies</span>
                                        </div>
                                        <span class="mx-2">•</span>
                                        <div class="flex items-center">
                                            <div class="w-4 h-4 flex items-center justify-center mr-1">
                                                <i class="ri-eye-line"></i>
                                            </div>
                                            <span>3.5K views</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Thread 2 -->
                        <div class="thread-card bg-gray-800/30 rounded p-4 transition">
                            <div class="flex items-start">
                                <div class="hidden sm:block mr-4">
                                    <div class="w-10 h-10 rounded-full overflow-hidden">
                                        <img src="https://readdy.ai/api/search-image?query=gaming%20profile%20avatar%20with%20fantasy%20elements%2C%20magical%2C%20detailed&width=100&height=100&seq=3&orientation=squarish"
                                            alt="User Avatar" class="w-full h-full object-cover" />
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center mb-1">
                                        <span
                                            class="bg-yellow-500/20 text-yellow-400 text-xs px-2 py-0.5 rounded-full mr-2">The
                                            Witcher 3</span>
                                        <span
                                            class="bg-gray-700 text-gray-300 text-xs px-2 py-0.5 rounded-full">Discussion</span>
                                    </div>
                                    <h3 class="font-semibold mb-1 hover:text-primary">
                                        The Witcher 3 Next-Gen Update: Worth Coming Back For?
                                    </h3>
                                    <p class="text-sm text-gray-400 mb-2 line-clamp-2">
                                        After playing through the next-gen update, I'm genuinely impressed with the
                                        visual improvements and quality-of-life changes. The ray tracing is stunning in
                                        Toussaint...
                                    </p>
                                    <div class="flex flex-wrap items-center text-xs text-gray-500">
                                        <span>Posted by <a href="#"
                                                class="text-blue-400 hover:underline">GeraltFan1995</a></span>
                                        <span class="mx-2">•</span>
                                        <span>4 days ago</span>
                                        <span class="mx-2">•</span>
                                        <div class="flex items-center">
                                            <div class="w-4 h-4 flex items-center justify-center mr-1">
                                                <i class="ri-message-3-line"></i>
                                            </div>
                                            <span>94 replies</span>
                                        </div>
                                        <span class="mx-2">•</span>
                                        <div class="flex items-center">
                                            <div class="w-4 h-4 flex items-center justify-center mr-1">
                                                <i class="ri-eye-line"></i>
                                            </div>
                                            <span>2.8K views</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Threads -->
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold">Recent Threads</h2>
                        <a href="#" class="text-primary text-sm hover:underline">View All</a>
                    </div>

                    <!-- Thread List -->
                    <div class="space-y-4">
                        <!-- Thread 1 -->
                        <div class="thread-card bg-gray-800/30 rounded p-4 transition">
                            <div class="flex items-start">
                                <div class="hidden sm:block mr-4">
                                    <div class="w-10 h-10 rounded-full overflow-hidden">
                                        <img src="https://readdy.ai/api/search-image?query=gaming%20profile%20avatar%20with%20dark%20theme%2C%20mysterious%2C%20shadowy&width=100&height=100&seq=6&orientation=squarish"
                                            alt="User Avatar" class="w-full h-full object-cover" />
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center mb-1">
                                        <span
                                            class="bg-blue-500/20 text-blue-400 text-xs px-2 py-0.5 rounded-full mr-2">Technical</span>
                                        <span
                                            class="bg-gray-700 text-gray-300 text-xs px-2 py-0.5 rounded-full">Question</span>
                                    </div>
                                    <h3 class="font-semibold mb-1 hover:text-primary">
                                        RTX 4080 Performance Issues with Latest Drivers
                                    </h3>
                                    <p class="text-sm text-gray-400 mb-2 line-clamp-2">
                                        After updating to the latest NVIDIA drivers (version 546.33), I'm experiencing
                                        significant frame drops in several games. Has anyone else noticed this issue?
                                    </p>
                                    <div class="flex flex-wrap items-center text-xs text-gray-500">
                                        <span>Posted by <a href="#"
                                                class="text-blue-400 hover:underline">TechGamer2025</a></span>
                                        <span class="mx-2">•</span>
                                        <span>5 hours ago</span>
                                        <span class="mx-2">•</span>
                                        <div class="flex items-center">
                                            <div class="w-4 h-4 flex items-center justify-center mr-1">
                                                <i class="ri-message-3-line"></i>
                                            </div>
                                            <span>12 replies</span>
                                        </div>
                                        <span class="mx-2">•</span>
                                        <div class="flex items-center">
                                            <div class="w-4 h-4 flex items-center justify-center mr-1">
                                                <i class="ri-eye-line"></i>
                                            </div>
                                            <span>243 views</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Thread 2 -->
                        <div class="thread-card bg-gray-800/30 rounded p-4 transition">
                            <div class="flex items-start">
                                <div class="hidden sm:block mr-4">
                                    <div class="w-10 h-10 rounded-full overflow-hidden">
                                        <img src="https://readdy.ai/api/search-image?query=gaming%20profile%20avatar%20with%20retro%20style%2C%20pixelated%2C%20nostalgic&width=100&height=100&seq=7&orientation=squarish"
                                            alt="User Avatar" class="w-full h-full object-cover" />
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center mb-1">
                                        <span
                                            class="bg-green-500/20 text-green-400 text-xs px-2 py-0.5 rounded-full mr-2">News</span>
                                        <span
                                            class="bg-gray-700 text-gray-300 text-xs px-2 py-0.5 rounded-full">Discussion</span>
                                    </div>
                                    <h3 class="font-semibold mb-1 hover:text-primary">
                                        New Cyberpunk 2077 DLC Rumors - What We Know So Far
                                    </h3>
                                    <p class="text-sm text-gray-400 mb-2 line-clamp-2">
                                        There have been some interesting leaks about a potential second expansion for
                                        Cyberpunk 2077. Let's compile what we know and discuss the possibilities...
                                    </p>
                                    <div class="flex flex-wrap items-center text-xs text-gray-500">
                                        <span>Posted by <a href="#"
                                                class="text-blue-400 hover:underline">CyberInsider</a></span>
                                        <span class="mx-2">•</span>
                                        <span>12 hours ago</span>
                                        <span class="mx-2">•</span>
                                        <div class="flex items-center">
                                            <div class="w-4 h-4 flex items-center justify-center mr-1">
                                                <i class="ri-message-3-line"></i>
                                            </div>
                                            <span>38 replies</span>
                                        </div>
                                        <span class="mx-2">•</span>
                                        <div class="flex items-center">
                                            <div class="w-4 h-4 flex items-center justify-center mr-1">
                                                <i class="ri-eye-line"></i>
                                            </div>
                                            <span>876 views</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-center">
                        <button
                            class="bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-button text-sm whitespace-nowrap">
                            Load More Threads
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="lg:w-1/4">
                <!-- Game-specific Forums -->
                <div class="bg-gray-800/50 rounded p-4 mb-6">
                    <h3 class="font-semibold mb-3">Game Forums</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="flex items-center text-sm hover:text-primary">
                                <div class="w-5 h-5 flex items-center justify-center mr-2">
                                    <i class="ri-gamepad-line"></i>
                                </div>
                                <span>Cyberpunk 2077</span>
                                <span class="ml-auto text-xs text-gray-500">324 threads</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-sm hover:text-primary">
                                <div class="w-5 h-5 flex items-center justify-center mr-2">
                                    <i class="ri-sword-line"></i>
                                </div>
                                <span>The Witcher 3: Wild Hunt</span>
                                <span class="ml-auto text-xs text-gray-500">287 threads</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-sm hover:text-primary">
                                <div class="w-5 h-5 flex items-center justify-center mr-2">
                                    <i class="ri-robot-line"></i>
                                </div>
                                <span>Deus Ex: Mankind Divided</span>
                                <span class="ml-auto text-xs text-gray-500">156 threads</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-sm hover:text-primary">
                                <div class="w-5 h-5 flex items-center justify-center mr-2">
                                    <i class="ri-ghost-line"></i>
                                </div>
                                <span>Red Dead Redemption 2</span>
                                <span class="ml-auto text-xs text-gray-500">219 threads</span>
                            </a>
                        </li>
                    </ul>
                    <a href="#" class="text-primary text-xs hover:underline block mt-3">View All Games</a>
                </div>

                <!-- Active Contributors -->
                <div class="bg-gray-800/50 rounded p-4 mb-6">
                    <h3 class="font-semibold mb-3">Top Contributors</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="flex items-center">
                                <div class="w-8 h-8 rounded-full overflow-hidden mr-2">
                                    <img src="https://readdy.ai/api/search-image?query=gaming%20profile%20avatar%20with%20cyberpunk%20style%2C%20glowing%20details&width=100&height=100&seq=2&orientation=squarish"
                                        alt="User Avatar" class="w-full h-full object-cover" />
                                </div>
                                <div>
                                    <p class="text-sm font-medium">NightCityLegend</p>
                                    <p class="text-xs text-gray-500">128 posts • Cyberpunk Expert</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center">
                                <div class="w-8 h-8 rounded-full overflow-hidden mr-2">
                                    <img src="https://readdy.ai/api/search-image?query=gaming%20profile%20avatar%20with%20fantasy%20elements%2C%20magical%2C%20detailed&width=100&height=100&seq=3&orientation=squarish"
                                        alt="User Avatar" class="w-full h-full object-cover" />
                                </div>
                                <div>
                                    <p class="text-sm font-medium">GeraltFan1995</p>
                                    <p class="text-xs text-gray-500">94 posts • Witcher Enthusiast</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Forum Guidelines -->
                <div class="bg-gray-800/50 rounded p-4">
                    <h3 class="font-semibold mb-3">Forum Guidelines</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li class="flex">
                            <div class="w-5 h-5 flex items-center justify-center text-green-400 mr-2 flex-shrink-0">
                                <i class="ri-check-line"></i>
                            </div>
                            <span>Be respectful to other community members</span>
                        </li>
                        <li class="flex">
                            <div class="w-5 h-5 flex items-center justify-center text-green-400 mr-2 flex-shrink-0">
                                <i class="ri-check-line"></i>
                            </div>
                            <span>Use appropriate thread categories</span>
                        </li>
                        <li class="flex">
                            <div class="w-5 h-5 flex items-center justify-center text-green-400 mr-2 flex-shrink-0">
                                <i class="ri-check-line"></i>
                            </div>
                            <span>No spam or self-promotion</span>
                        </li>
                    </ul>
                    <a href="#" class="text-primary text-xs hover:underline block mt-3">Read Full Guidelines</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-[#151b27] mt-12 pt-8 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <a href="/" class="text-2xl font-['Pacifico'] text-primary mb-4 inline-block">GameHaven</a>
                    <p class="text-gray-400 text-sm mb-4">
                        Your ultimate destination for digital entertainment and gaming experiences.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-twitter-x-line"></i>
                            </div>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-facebook-line"></i>
                            </div>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-instagram-line"></i>
                            </div>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-youtube-line"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">Support</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white text-sm">Help Center</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white text-sm">Community</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white text-sm">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">Legal</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white text-sm">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white text-sm">Terms of Service</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white text-sm">Cookie Policy</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">Follow Us</h3>
                    <p class="text-gray-400 text-sm mb-4">
                        Stay updated with the latest gaming news and community events.
                    </p>
                    <div class="flex">
                        <input type="email" placeholder="Your email"
                            class="bg-gray-800 text-white px-3 py-2 rounded-l text-sm border-none focus:outline-none focus:ring-1 focus:ring-primary flex-1" />
                        <button
                            class="bg-primary hover:bg-primary/90 text-white px-3 py-2 rounded-r text-sm whitespace-nowrap">
                            Subscribe
                        </button>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-6 text-center">
                <p class="text-gray-500 text-sm">
                    © 2024 GameHaven. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Sort dropdown toggle
            const sortButton = document.querySelector('button:has(span:contains("Sort"))') ||
                document.querySelector('button span:contains("Sort")').closest('button');

            if (sortButton) {
                sortButton.addEventListener("click", function() {
                    const dropdown = this.closest('.relative').querySelector('.absolute');
                    if (dropdown) {
                        dropdown.classList.toggle("hidden");
                    }
                });
            }

            // Close dropdowns when clicking outside
            document.addEventListener("click", function(event) {
                const dropdowns = document.querySelectorAll(".absolute:not(.hidden)");
                dropdowns.forEach((dropdown) => {
                    const button = dropdown.previousElementSibling;
                    if (button && !button.contains(event.target) && !dropdown.contains(event
                            .target)) {
                        dropdown.classList.add("hidden");
                    }
                });
            });
        });
    </script>
</body>

</html>
