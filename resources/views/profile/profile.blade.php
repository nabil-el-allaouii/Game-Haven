<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamer Profile - GameHaven</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/css/glide.core.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/css/glide.theme.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/glide.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Custom toggle switch styling */
        .toggle-circle {
            transition: transform 0.2s ease-in-out;
        }

        .toggle-checkbox:checked+.toggle-container {
            background-color: var(--custom-color);
        }

        .toggle-checkbox:checked+.toggle-container .toggle-circle {
            transform: translateX(1.25rem);
        }

        :root {
            --custom-color: #6C3BF7;
        }
    </style>
</head>

<body class="bg-gray-900 text-white min-h-screen profile-page">
    <!-- Header Navigation -->
    <header class="bg-gray-800/95 backdrop-blur-sm border-b border-gray-700">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="/" class="flex-shrink-0 flex items-center">
                        <img class="h-8 w-auto mr-2" src="https://ai-public.creatie.ai/gen_page/logo_placeholder.png"
                            alt="GameHaven">
                    </a>
                    <div class="hidden md:block ml-10">
                        <div class="flex items-center space-x-4">
                            <a href="/"
                                class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">Home</a>
                            <a href="#"
                                class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">Games</a>
                            <a href="#"
                                class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">Community</a>
                            <a href="#" class="text-custom hover:text-custom/80 px-3 py-2 text-sm font-medium">My
                                Profile</a>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="text-gray-300 hover:text-white">
                            <i class="fas fa-bell text-xl"></i>
                            <span
                                class="absolute -top-1 -right-1 bg-custom text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                        </button>
                    </div>
                    <div class="flex items-center">
                        <div class="h-8 w-8 rounded-full overflow-hidden bg-gray-700">
                            <img src="https://creatie.ai/ai/api/search-image?query=cyberpunk style gaming avatar with neon accents, digital art, highly detailed&width=128&height=128&orientation=squarish&flag=e22210cf-78fd-4242-8d9e-491248bc5a9f"
                                alt="User Avatar" class="h-full w-full object-cover">
                        </div>
                        <span class="ml-2 text-sm font-medium hidden md:inline-block">{{ auth()->user()->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="max-w-8xl mx-auto px-4 py-8">
        <div class="grid grid-cols-12 gap-8">
            <div class="col-span-12 md:col-span-3">
                <div class="bg-gray-800 rounded-lg p-6 mb-8">
                    <div class="flex flex-col items-center">
                        <div class="w-32 h-32 rounded-full bg-gray-700 mb-4 overflow-hidden">
                            <img src="https://creatie.ai/ai/api/search-image?query=cyberpunk style gaming avatar with neon accents, digital art, highly detailed&width=128&height=128&orientation=squarish&flag=e22210cf-78fd-4242-8d9e-491248bc5a9f"
                                alt="Profile" class="w-full h-full object-cover">
                        </div>
                        <h1 class="text-2xl font-bold mb-1">{{ auth()->user()->name ?? 'CyberNinja2077' }}</h1>
                        <div class="flex items-center gap-2 mb-4">
                            <span class="text-custom">Level 42</span>
                            <span class="text-gray-400">•</span>
                            <span class="text-gray-400">Elite Gamer</span>
                        </div>
                        <div class="w-full space-y-4">
                            <div class="flex justify-between">
                                <span class="text-gray-400">Games Completed</span>
                                <span class="text-custom font-semibold">247</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Achievements</span>
                                <span class="text-custom font-semibold">1,893</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Forum Posts</span>
                                <span class="text-custom font-semibold">426</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-800 rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Social</h2>
                    <div class="space-y-4">
                        <button
                            class="w-full bg-gray-700 hover:bg-gray-600 !rounded-button py-2 px-4 flex justify-between items-center">
                            <span>Followers</span>
                            <span class="text-custom">892</span>
                        </button>
                        <button
                            class="w-full bg-custom hover:bg-custom/90 !rounded-button py-2 px-4 flex justify-between items-center">
                            <span>Following</span>
                            <span>571</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-6 space-y-8">
                <div class="bg-gray-800 rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Recent Activity</h2>
                    <div class="space-y-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-medium">Completed Cyber Edge 2088</h3>
                                <p class="text-gray-400 text-sm">Achieved 100% completion with all side missions
                                    cleared!</p>
                            </div>
                            <span class="text-sm text-gray-400">2h ago</span>
                        </div>
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-medium">New Achievement Unlocked</h3>
                                <p class="text-gray-400 text-sm">Master Hacker: Completed all hacking challenges</p>
                            </div>
                            <span class="text-sm text-gray-400">5h ago</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-6">Favorite Games</h2>
                    <div class="glide">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">
                                <li class="glide__slide">
                                    <div class="relative rounded-lg overflow-hidden">
                                        <img src="https://creatie.ai/ai/api/search-image?query=futuristic cyberpunk game scene with neon city background, digital art, highly detailed&width=400&height=225&orientation=landscape&flag=891d1367-5780-499b-aedb-df7a75c4f507"
                                            alt="Game 1" class="w-full h-48 object-cover">
                                        <div
                                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                                            <h3 class="font-medium">Cyber Edge 2088</h3>
                                            <div class="flex items-center gap-4 text-sm">
                                                <span>120h played</span>
                                                <span>100% complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="glide__slide">
                                    <div class="relative rounded-lg overflow-hidden">
                                        <img src="https://creatie.ai/ai/api/search-image?query=sci-fi space exploration game scene with colorful nebula background, digital art, highly detailed&width=400&height=225&orientation=landscape&flag=ae812122-08bb-4e50-a3f0-ac610c3346bc"
                                            alt="Game 2" class="w-full h-48 object-cover">
                                        <div
                                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                                            <h3 class="font-medium">Stellar Odyssey</h3>
                                            <div class="flex items-center gap-4 text-sm">
                                                <span>85h played</span>
                                                <span>92% complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="glide__bullets" data-glide-el="controls[nav]">
                            <button class="glide__bullet" data-glide-dir="=0"></button>
                            <button class="glide__bullet" data-glide-dir="=1"></button>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Gaming Stats</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gray-700 rounded-lg p-4">
                            <h3 class="text-sm text-gray-400 mb-2">Weekly Playtime</h3>
                            <p class="text-2xl font-semibold">32.5 hours</p>
                        </div>
                        <div class="bg-gray-700 rounded-lg p-4">
                            <h3 class="text-sm text-gray-400 mb-2">Total Games</h3>
                            <p class="text-2xl font-semibold text-custom">412</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-3">
                <div class="bg-gray-800 rounded-lg p-6 mb-8">
                    <h2 class="text-xl font-semibold mb-4">Privacy Settings</h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span>Profile Visibility</span>
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only toggle-checkbox" checked>
                                <div
                                    class="relative w-11 h-6 bg-gray-700 rounded-full toggle-container transition-colors duration-200">
                                    <div class="toggle-circle absolute left-1 top-1 bg-white w-4 h-4 rounded-full">
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Show Playtime</span>
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only toggle-checkbox" checked>
                                <div
                                    class="relative w-11 h-6 bg-gray-700 rounded-full toggle-container transition-colors duration-200">
                                    <div class="toggle-circle absolute left-1 top-1 bg-white w-4 h-4 rounded-full">
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Activity Feed</span>
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only toggle-checkbox" checked>
                                <div
                                    class="relative w-11 h-6 bg-gray-700 rounded-full toggle-container transition-colors duration-200">
                                    <div class="toggle-circle absolute left-1 top-1 bg-white w-4 h-4 rounded-full">
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Trophy Case</h2>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="text-center">
                            <div
                                class="w-16 h-16 mx-auto bg-gray-700 rounded-lg flex items-center justify-center mb-2">
                                <i class="fas fa-trophy text-2xl text-yellow-500"></i>
                            </div>
                            <span class="text-sm">Elite</span>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 mx-auto bg-custom rounded-lg flex items-center justify-center mb-2">
                                <i class="fas fa-medal text-2xl text-white"></i>
                            </div>
                            <span class="text-sm">Master</span>
                        </div>
                        <div class="text-center">
                            <div
                                class="w-16 h-16 mx-auto bg-gray-700 rounded-lg flex items-center justify-center mb-2">
                                <i class="fas fa-star text-2xl text-purple-500"></i>
                            </div>
                            <span class="text-sm">Legend</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Glide('.glide', {
                type: 'carousel',
                perView: 1,
                gap: 20,
                autoplay: 3000
            }).mount();
        });
    </script>
</body>

</html>
