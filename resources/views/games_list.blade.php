@extends('layouts.app')

@section('title', 'Game Library - GameHaven')

@section('styles')
    <style>
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

        .star-rating:hover label {
            color: #a0aec0;
        }

        .star-rating label:hover,
        .star-rating label:hover~label,
        .star-rating input:checked~label {
            color: #ecc94b !important;
        }
    </style>
@endsection

@section('content')
    <main class="container mx-auto px-6 py-8 flex">
        <div class="w-64 mr-8">
            <div class="filter-section p-5 rounded mb-6 shadow-lg">
                <h3 class="text-lg font-medium mb-4 text-purple-400">Platforms</h3>
                <form action="{{ route('platform.filter') }}" method="GET">
                    @csrf
                    <div class="space-y-3">
                        <select name="platform" id="platform-select"
                            class="w-full bg-gray-800 border border-gray-700 rounded-md px-3 py-2 text-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-600">
                            <option value="">All Platforms</option>
                            <option value="playstation">PlayStation</option>
                            <option value="xbox">Xbox</option>
                            <option value="pc">PC</option>
                            <option value="nintendo">Nintendo</option>
                            <option value="Android">Android</option>
                            <option value="IOS">IOS</option>
                        </select>
                        <div class="text-xs text-gray-400 mt-2">
                            Select a platform to filter games
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-purple-400 px-2 py-1 rounded-md text-white cursor-pointer hover:bg-purple-500 mt-4">Filter</button>
                    </div>
                </form>
            </div>

            <div class="filter-section p-5 rounded shadow-lg">
                <h3 class="text-lg font-medium mb-4 text-purple-400">Rating</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-400">Min Rating: </span>
                        <span id="rating-value" class="text-purple-300 font-medium">0</span>
                    </div>
                    <input type="range" id="rating-slider" min="0" max="5" step="1" value="0"
                        class="w-full accent-purple-500 bg-gray-700 h-2 rounded-lg appearance-none cursor-pointer">
                    <div class="flex justify-between text-xs text-gray-500">
                        <span>0</span>
                        <span>1</span>
                        <span>2</span>
                        <span>3</span>
                        <span>4</span>
                        <span>5</span>
                    </div>
                    <form action="{{ Route('rate.filter') }}" method="GET">
                        @csrf
                        <input type="hidden" name="rating" id="filterRating" value="0">
                        <div class="flex justify-end">
                            <button class="bg-purple-400 px-2 py-1 rounded-md text-white cursor-pointer hover:bg-purple-500"
                                type="submit">Filter</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="filter-section p-5 rounded shadow-lg mt-6">
                <h3 class="text-lg font-medium mb-4 text-purple-400">Price</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-400">Min Price: </span>
                        <span id="price-value" class="text-purple-300 font-medium">$0</span>
                    </div>
                    <input type="range" id="price-slider" min="0" max="100" step="5" value="0"
                        class="w-full accent-purple-500 bg-gray-700 h-2 rounded-lg appearance-none cursor-pointer">
                    <div class="flex justify-between text-xs text-gray-500">
                        <span>$0</span>
                        <span>$25</span>
                        <span>$50</span>
                        <span>$75</span>
                        <span>$100+</span>
                    </div>
                    <form action="{{ route('price.filter') }}" method="GET">
                        @csrf
                        <input type="hidden" name="price" id="filterPrice" value="0">
                        <div class="flex justify-end">
                            <button class="bg-purple-400 px-2 py-1 rounded-md text-white cursor-pointer hover:bg-purple-500"
                                type="submit">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="flex-1">
            <div class="flex justify-end mb-6">
                <div class="relative flex">
                    <form class="mr-3" action="{{ route('game.search') }}" method="GET">
                        @csrf
                        <div class="relative">
                            <input name="keyword" type="text" placeholder="Search games..."
                                class="search-input py-2 pl-10 pr-4 rounded-lg w-64 focus:outline-none focus:ring-2 focus:ring-purple-600" />
                            <div class="absolute left-3 top-2.5 w-5 h-5 flex items-center justify-center text-gray-400">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                    </form>
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
                            <img src="{{ $game->cover }}" alt="{{ $game->gameTitle }}" class="w-full h-full object-cover">
                            <div
                                class="absolute top-0 right-0 bg-black bg-opacity-70 px-2 py-1 m-2 rounded text-xs font-bold">
                                ${{ $game->price }}
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-medium text-gray-100 truncate w-3/4">{{ $game->gameTitle }}</h3>
                            </div>

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
                                <a href="/game/{{ $game->id }}"
                                    class="text-purple-400 hover:text-purple-300 text-sm font-medium">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($games->hasPages())
                <div class="mt-10 px-4 py-4 bg-gray-800 rounded-lg shadow-md">
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            Showing {{ $games->firstItem() }} - {{ $games->lastItem() }} of {{ $games->total() }}
                            games
                        </div>
                        <div>
                            {{ $games->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        let rating = document.getElementById('filterRating');
        document.addEventListener("DOMContentLoaded", function() {
            const ratingSlider = document.getElementById('rating-slider');
            const ratingValue = document.getElementById('rating-value');
            const filterRating = document.getElementById('filterRating');

            if (filterRating.value) {
                ratingSlider.value = filterRating.value;
                ratingValue.textContent = filterRating.value;
            }

            ratingSlider.addEventListener('input', function() {
                const value = this.value;
                ratingValue.textContent = value;
                filterRating.value = value;
            });

            const priceSlider = document.getElementById('price-slider');
            const priceValue = document.getElementById('price-value');
            const filterPrice = document.getElementById('filterPrice');

            if (filterPrice.value) {
                priceSlider.value = filterPrice.value;
                priceValue.textContent = '$' + filterPrice.value;
            }

            priceSlider.addEventListener('input', function() {
                const value = this.value;
                priceValue.textContent = '$' + value;
                filterPrice.value = value;
            });
        });
    </script>
@endsection
