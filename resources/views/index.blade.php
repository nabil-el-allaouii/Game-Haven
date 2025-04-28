@extends('layouts.app')

@section('title', 'GameHaven - Your Gateway to Gaming Excellence')

@section('styles')
    <style>
        .gradient-text {
            background: linear-gradient(to right, #000000, #03a9f4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }

        .font-orbitron {
            font-family: 'Orbitron', sans-serif;
        }
    </style>
@endsection

@section('content')
    <main class="flex-grow">
        <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="text-center max-w-3xl mx-auto">
                    <h1 class="font-orbitron text-5xl font-bold tracking-tight mb-6 gradient-text">
                        Your Gateway to Gaming Excellence
                    </h1>
                    <p class="text-gray-400 text-lg mb-12">
                        Discover, play, and connect with millions of gamers worldwide. Experience the future of gaming,
                        today.
                    </p>
                    <div class="relative max-w-2xl mx-auto">
                        <div class="relative">
                            <input type="text" placeholder="Search games, genres, platforms..."
                                class="w-full pl-12 pr-4 py-3 bg-gray-800 border border-gray-700 focus:border-custom focus:ring-1 focus:ring-custom text-white rounded-lg">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <button class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                <i class="fas fa-microphone text-gray-400 hover:text-custom"></i>
                            </button>
                        </div>
                        <div class="flex justify-center gap-4 mt-6">
                            <button
                                class="!rounded-button bg-gray-800 hover:bg-gray-700 px-6 py-2 text-sm font-medium flex items-center gap-2">
                                <i class="fas fa-desktop"></i> PC
                            </button>
                            <button
                                class="!rounded-button bg-gray-800 hover:bg-gray-700 px-6 py-2 text-sm font-medium flex items-center gap-2">
                                <i class="fas fa-gamepad"></i> Console
                            </button>
                            <button
                                class="!rounded-button bg-gray-800 hover:bg-gray-700 px-6 py-2 text-sm font-medium flex items-center gap-2">
                                <i class="fas fa-vr-cardboard"></i> VR
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 bg-gray-800/50">
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="font-orbitron text-3xl font-bold mb-8">Trending Now</h2>
                <div class="glide">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            @foreach ($games as $game)
                                <li class="glide__slide">
                                    <div class="relative rounded-lg overflow-hidden">
                                        <img src="{{ $game->cover }}" alt="Game 1" class="w-full h-64 object-cover">
                                        <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black">
                                            <h3 class="text-lg font-bold">{{ $game->title }}</h3>
                                            @foreach ($game->genres->take(1) as $genre)
                                                <p class="text-sm text-gray-300">{{ $genre->genre }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="glide__bullets" data-glide-el="controls[nav]">
                        @foreach ($games as $game)
                            <button class="glide__bullet" data-glide-dir="={{ $loop->index }}"></button>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16">
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="font-orbitron text-3xl font-bold mb-8">Browse Categories</h2>
                <div class="flex flex-wrap gap-4">
                    <button
                        class="!rounded-button bg-gray-800 hover:bg-gray-700 px-6 py-3 text-sm font-medium">Action</button>
                    <button class="!rounded-button bg-gray-800 hover:bg-gray-700 px-6 py-3 text-sm font-medium">RPG</button>
                    <button
                        class="!rounded-button bg-gray-800 hover:bg-gray-700 px-6 py-3 text-sm font-medium">Strategy</button>
                    <button
                        class="!rounded-button bg-gray-800 hover:bg-gray-700 px-6 py-3 text-sm font-medium">Sports</button>
                    <button
                        class="!rounded-button bg-gray-800 hover:bg-gray-700 px-6 py-3 text-sm font-medium">Adventure</button>
                    <button
                        class="!rounded-button bg-gray-800 hover:bg-gray-700 px-6 py-3 text-sm font-medium">Simulation</button>
                    <button
                        class="!rounded-button bg-gray-800 hover:bg-gray-700 px-6 py-3 text-sm font-medium">Racing</button>
                    <button
                        class="!rounded-button bg-gray-800 hover:bg-gray-700 px-6 py-3 text-sm font-medium">More</button>
                </div>
            </div>
        </section>

        <section class="py-16 bg-gray-800/50">
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="font-orbitron text-3xl font-bold mb-4">Join Our Gaming Community</h2>
                    <p class="text-gray-400 mb-12 max-w-2xl mx-auto">
                        Connect with millions of gamers worldwide, share your achievements, and stay updated with the
                        latest gaming news and events.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-2xl mx-auto mb-12">
                        <div class="bg-gray-800 rounded-lg p-8">
                            <div class="text-4xl font-bold text-custom mb-2">2.5M+</div>
                            <div class="text-gray-400">Active Users</div>
                        </div>
                        <div class="bg-gray-800 rounded-lg p-8">
                            <div class="text-4xl font-bold text-custom mb-2">500K+</div>
                            <div class="text-gray-400">Daily Posts</div>
                        </div>
                    </div>
                    <button class="!rounded-button bg-custom hover:bg-custom/90 px-8 py-3 text-lg font-medium">Join
                        Community</button>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Glide('.glide', {
                type: 'carousel',
                startAt: 0,
                perView: 3,
                gap: 24,
                breakpoints: {
                    1024: {
                        perView: 2
                    },
                    640: {
                        perView: 1
                    }
                }
            }).mount();
        });
    </script>
@endsection
