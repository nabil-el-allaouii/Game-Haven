<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Game Library - GameHaven</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-color: #1a202c;
            color: #e2e8f0;
        }

        .game-card {
            background-color: #1f2937;
            transition: transform 0.2s;
        }

        .game-card:hover {
            transform: translateY(-5px);
        }

        .checkbox-custom {
            appearance: none;
            width: 18px;
            height: 18px;
            border: 2px solid #4a5568;
            border-radius: 4px;
            position: relative;
            cursor: pointer;
            background-color: transparent;
        }

        .checkbox-custom:checked {
            background-color: #6b46c1;
            border-color: #6b46c1;
        }

        .checkbox-custom:checked::after {
            content: '';
            position: absolute;
            left: 5px;
            top: 2px;
            width: 6px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .search-input {
            background-color: #2d3748;
            color: white;
        }

        .search-input::placeholder {
            color: #a0aec0;
        }

        .platform-icon {
            width: 20px;
            height: 20px;
        }

        .filter-section {
            background-color: #2d3748;
            border: 1px solid #4a5568;
            border-radius: 0.5rem;
        }

        .custom-rounded {
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <!-- Header Navigation -->
    <header class="bg-gray-800 py-4 px-6 flex items-center justify-between">
        <div class="flex items-center">
            <a href="/" class="text-purple-600 text-2xl font-['Pacifico'] mr-10">GameHaven</a>
            <nav class="flex space-x-8">
                <a href="/" class="text-white font-medium">Games</a>
                <a href="#" class="text-gray-400 hover:text-white">Browse</a>
                <a href="#" class="text-gray-400 hover:text-white">Library</a>
            </nav>
        </div>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="text" placeholder="Search games..."
                    class="search-input py-2 pl-10 pr-4 rounded-lg w-64 focus:outline-none focus:ring-2 focus:ring-purple-600" />
                <div class="absolute left-3 top-2.5 w-5 h-5 flex items-center justify-center text-gray-400">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <button class="bg-gray-900 text-white px-4 py-2 rounded-md hover:bg-gray-700 whitespace-nowrap">
                <div class="flex items-center">
                    <i class="fas fa-user mr-2"></i>
                    Sign In
                </div>
            </button>
        </div>
    </header>


    <main class="container mx-auto px-6 py-8 flex">
        <div class="w-64 mr-8">
            <div class="filter-section p-5 rounded mb-6 shadow-lg">
                <h3 class="text-lg font-medium mb-4 text-purple-400">Platforms</h3>
                <div class="space-y-3">
                    <div class="flex items-center">
                        <input type="checkbox" id="playstation" class="checkbox-custom mr-3" />
                        <label for="playstation" class="flex items-center cursor-pointer hover:text-purple-300">
                            <div class="w-5 h-5 flex items-center justify-center text-blue-400 mr-2">
                                <i class="fab fa-playstation"></i>
                            </div>
                            PlayStation
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="xbox" class="checkbox-custom mr-3" />
                        <label for="xbox" class="flex items-center cursor-pointer hover:text-purple-300">
                            <div class="w-5 h-5 flex items-center justify-center text-green-500 mr-2">
                                <i class="fab fa-xbox"></i>
                            </div>
                            Xbox
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="pc" class="checkbox-custom mr-3" />
                        <label for="pc" class="flex items-center cursor-pointer hover:text-purple-300">
                            <div class="w-5 h-5 flex items-center justify-center text-gray-300 mr-2">
                                <i class="fas fa-desktop"></i>
                            </div>
                            PC
                        </label>
                    </div>
                </div>
            </div>

            <div class="filter-section p-5 rounded mb-6 shadow-lg">
                <h3 class="text-lg font-medium mb-4 text-purple-400">Genres</h3>
                <div class="space-y-3">
                    <div class="flex items-center">
                        <input type="checkbox" id="action" class="checkbox-custom mr-3" />
                        <label for="action" class="cursor-pointer hover:text-purple-300">Action</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="adventure" class="checkbox-custom mr-3" />
                        <label for="adventure" class="cursor-pointer hover:text-purple-300">Adventure</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="rpg" class="checkbox-custom mr-3" />
                        <label for="rpg" class="cursor-pointer hover:text-purple-300">RPG</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="strategy" class="checkbox-custom mr-3" />
                        <label for="strategy" class="cursor-pointer hover:text-purple-300">Strategy</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="sports" class="checkbox-custom mr-3" />
                        <label for="sports" class="cursor-pointer hover:text-purple-300">Sports</label>
                    </div>
                </div>
            </div>


            <div class="filter-section p-5 rounded shadow-lg">
                <h3 class="text-lg font-medium mb-4 text-purple-400">Features</h3>
                <div class="space-y-3">
                    <div class="flex items-center">
                        <input type="checkbox" id="multiplayer" class="checkbox-custom mr-3" />
                        <label for="multiplayer" class="cursor-pointer hover:text-purple-300">Multiplayer</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="singleplayer" class="checkbox-custom mr-3" />
                        <label for="singleplayer" class="cursor-pointer hover:text-purple-300">Single Player</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="controller" class="checkbox-custom mr-3" />
                        <label for="controller" class="cursor-pointer hover:text-purple-300">Controller
                            Support</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Game Grid -->
        <div class="flex-1">
            <div class="flex justify-end mb-6">
                <div class="relative">
                    <button
                        class="bg-gray-800 text-white px-4 py-2 rounded-md flex items-center whitespace-nowrap border border-gray-700 hover:bg-gray-700">
                        Most Popular
                        <i class="fas fa-chevron-down ml-2"></i>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($games as $game)
                    <div class="game-card rounded-lg overflow-hidden shadow-lg hover:shadow-xl">
                        <div class="h-48 bg-gray-700 overflow-hidden relative">
                            <img src="{{ $game->cover }}" alt="{{ $game->gameTitle }}"
                                class="w-full h-full object-cover">
                            <div
                                class="absolute top-0 right-0 bg-black bg-opacity-70 px-2 py-1 m-2 rounded text-xs font-bold">
                                ${{ $game->price }}
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-medium text-gray-100 truncate w-3/4">{{ $game->gameTitle }}</h3>
                            </div>

                            <!-- Platform icons moved below the title -->
                            <div class="flex flex-wrap items-center mb-2">
                                @php
                                    $platformCount = count($game->platforms);
                                    $maxVisible = 4;
                                    $displayCount = 0;
                                    $displayPlaystation = false;
                                @endphp

                                @foreach ($game->platforms as $platform)
                                    @if ($displayCount < $maxVisible)
                                        @php $displayCount++; @endphp
                                        @if (str_contains($platform->name, 'Xbox'))
                                            <div class="flex items-center justify-center rounded-full bg-gray-800 text-green-500 mr-1 mb-1 w-6 h-6"
                                                title="{{ $platform->name }}">
                                                <i class="fab fa-xbox text-xs"></i>
                                            </div>
                                        @elseif (str_contains($platform->name, 'PlayStation') && !$displayPlaystation)
                                            @php $displayPlaystation = true; @endphp
                                            <div class="flex items-center justify-center rounded-full bg-gray-800 text-blue-400 mr-1 mb-1 w-6 h-6"
                                                title="{{ $platform->name }}">
                                                <i class="fab fa-playstation text-xs"></i>
                                            </div>
                                        @elseif (str_contains($platform->name, 'Nintendo'))
                                            <div class="flex items-center justify-center rounded-full bg-gray-800 text-red-500 mr-1 mb-1 w-6 h-6"
                                                title="{{ $platform->name }}">
                                                <i class="fas fa-gamepad text-xs"></i>
                                            </div>
                                        @elseif (str_contains($platform->name, 'PC'))
                                            <div class="flex items-center justify-center rounded-full bg-gray-800 text-blue-300 mr-1 mb-1 w-6 h-6"
                                                title="{{ $platform->name }}">
                                                <i class="fab fa-windows text-xs"></i>
                                            </div>
                                        @elseif (str_contains($platform->name, 'Linux'))
                                            <div class="flex items-center justify-center rounded-full bg-gray-800 text-yellow-300 mr-1 mb-1 w-6 h-6"
                                                title="{{ $platform->name }}">
                                                <i class="fab fa-linux text-xs"></i>
                                            </div>
                                        @elseif (str_contains($platform->name, 'macOS'))
                                            <div class="flex items-center justify-center rounded-full bg-gray-800 text-gray-300 mr-1 mb-1 w-6 h-6"
                                                title="{{ $platform->name }}">
                                                <i class="fab fa-apple text-xs"></i>
                                            </div>
                                        @elseif (str_contains($platform->name, 'Android'))
                                            <div class="flex items-center justify-center rounded-full bg-gray-800 text-green-400 mr-1 mb-1 w-6 h-6"
                                                title="{{ $platform->name }}">
                                                <i class="fab fa-android text-xs"></i>
                                            </div>
                                        @else
                                            <div class="flex items-center justify-center rounded-full bg-gray-800 text-gray-300 mr-1 mb-1 w-6 h-6"
                                                title="{{ $platform->name }}">
                                                <i class="fas fa-desktop text-xs"></i>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach

                                @if ($platformCount > $maxVisible)
                                    <div class="flex items-center justify-center rounded-full bg-gray-700 text-gray-300 mr-1 mb-1 w-6 h-6"
                                        title="More platforms">
                                        <span class="text-xs">+{{ $platformCount - $maxVisible }}</span>
                                    </div>
                                @endif
                            </div>

                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-400 mr-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= floor($game->rating))
                                            <i class="fas fa-star text-xs"></i>
                                        @elseif ($i - 0.5 <= $game->rating)
                                            <i class="fas fa-star-half-alt text-xs"></i>
                                        @else
                                            <i class="far fa-star text-xs"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-sm text-gray-400">{{ $game->rating }}/5</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="text-sm text-gray-400">
                                    @if (isset($game->release))
                                        <i class="far fa-calendar-alt mr-1"></i>
                                        {{ \Carbon\Carbon::parse($game->release)->format('Y') }}
                                    @endif
                                </div>
                                <a href="/games/{{ $game->id }}"
                                    class="text-purple-400 hover:text-purple-300 text-sm font-medium">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($games->hasPages())
                <div class="mt-10 px-4 py-4 bg-gray-800 rounded-lg shadow-md">
                    <div class="flex flex-col sm:flex-row justify-between items-center">
                        <div class="text-sm text-gray-400 mb-4 sm:mb-0">
                            Showing {{ $games->firstItem() }} - {{ $games->lastItem() }} of {{ $games->total() }}
                            games
                        </div>
                        <div class="flex">
                            @if ($games->onFirstPage())
                                <span class="px-3 py-1 bg-gray-700 text-gray-500 rounded-l-md cursor-not-allowed">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                            @else
                                <a href="{{ $games->previousPageUrl() }}"
                                    class="px-3 py-1 bg-gray-700 hover:bg-gray-600 text-white rounded-l-md">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            @endif

                            @foreach ($games->getUrlRange(max($games->currentPage() - 2, 1), min($games->currentPage() + 2, $games->lastPage())) as $page => $url)
                                @if ($page == $games->currentPage())
                                    <span class="px-3 py-1 bg-purple-600 text-white">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="px-3 py-1 bg-gray-700 hover:bg-gray-600 text-white">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach

                            @if ($games->hasMorePages())
                                <a href="{{ $games->nextPageUrl() }}"
                                    class="px-3 py-1 bg-gray-700 hover:bg-gray-600 text-white rounded-r-md">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            @else
                                <span class="px-3 py-1 bg-gray-700 text-gray-500 rounded-r-md cursor-not-allowed">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 py-12 mt-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Company Info -->
                <div>
                    <a href="/" class="text-purple-600 text-2xl font-['Pacifico'] block mb-4">GameHaven</a>
                    <p class="text-gray-400 text-sm">
                        Your ultimate destination for digital gaming entertainment.
                    </p>
                </div>
                <!-- Quick Links -->
                <div>
                    <h4 class="text-white font-medium mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white text-sm">About Us</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white text-sm">Careers</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white text-sm">Support</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white text-sm">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Legal -->
                <div>
                    <h4 class="text-white font-medium mb-4">Legal</h4>
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
            </div>

            <!-- Social Media & Copyright -->
            <div class="mt-12 pt-8 border-t border-gray-800">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-500 text-sm mb-4 md:mb-0">
                        © 2024 GameHaven. All rights reserved.
                    </p>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="fab fa-twitter"></i>
                            </div>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="fab fa-facebook-f"></i>
                            </div>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="fab fa-instagram"></i>
                            </div>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="fab fa-discord"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const checkboxes = document.querySelectorAll(".checkbox-custom");
            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener("change", function() {
                    // Filter functionality would go here
                });
            });
        });
    </script>
</body>

</html>
