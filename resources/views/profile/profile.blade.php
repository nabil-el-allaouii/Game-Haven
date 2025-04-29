@extends('layouts.app')

@section('title', 'Gamer Profile - GameHaven')

@section('styles')
    <style>
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
@endsection

@section('content')
    <div class="max-w-8xl mx-auto px-4 py-8">
        <div class="grid grid-cols-12 gap-8">
            <div class="col-span-12 md:col-span-4">
                <div class="bg-gray-800 rounded-lg p-6 mb-8">
                    <div class="flex flex-col items-center">
                        <div class="w-32 h-32 rounded-full bg-gray-700 mb-4 overflow-hidden">
                            <img src="https://creatie.ai/ai/api/search-image?query=cyberpunk style gaming avatar with neon accents, digital art, highly detailed&width=128&height=128&orientation=squarish&flag=e22210cf-78fd-4242-8d9e-491248bc5a9f"
                                alt="Profile" class="w-full h-full object-cover">
                        </div>
                        <h1 class="text-2xl font-bold mb-4">{{ auth()->user()->name ?? 'CyberNinja2077' }}</h1>
                        <div class="w-full space-y-4">
                            <div class="flex justify-between">
                                <span class="text-gray-400">Games Favorited</span>
                                <span class="text-custom font-semibold">{{ $favorites->count() }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Forum Posts</span>
                                <span class="text-custom font-semibold">{{ $threads->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-8 space-y-8">
                <div class="bg-gray-800 rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Recent Activity</h2>
                    <div class="space-y-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-medium">Completed Cyber Edge 2088</h3>
                                <p class="text-gray-400 text-sm">Achieved 100% completion with all side missions cleared!
                                </p>
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
                                @foreach ($favorites as $favorite)
                                    <a href="/game/{{$favorite->id}}">
                                        <li class="glide__slide">
                                            <div class="relative rounded-lg overflow-hidden">
                                                <img src="{{ $favorite->cover }}" alt="Game 1"
                                                    class="w-full h-48 object-cover">
                                                <div
                                                    class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                                                    <h3 class="font-medium">{{ $favorite->gameTitle }}</h3>
                                                    <div class="flex items-center gap-4 text-sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </a>
                                @endforeach
                            </ul>
                        </div>
                        <div class="glide__bullets" data-glide-el="controls[nav]">
                            @foreach ($favorites as $favorite)
                                <button class="glide__bullet" data-glide-dir="={{ $loop->index }}"></button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Glide('.glide', {
                type: 'carousel',
                perView: 1,
                gap: 20,
                autoplay: 6000
            }).mount();
        });
    </script>
@endsection
