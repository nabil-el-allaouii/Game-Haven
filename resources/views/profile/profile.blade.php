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
                                    <div class="toggle-circle absolute left-1 top-1 bg-white w-4 h-4 rounded-full"></div>
                                </div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Show Playtime</span>
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only toggle-checkbox" checked>
                                <div
                                    class="relative w-11 h-6 bg-gray-700 rounded-full toggle-container transition-colors duration-200">
                                    <div class="toggle-circle absolute left-1 top-1 bg-white w-4 h-4 rounded-full"></div>
                                </div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Activity Feed</span>
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only toggle-checkbox" checked>
                                <div
                                    class="relative w-11 h-6 bg-gray-700 rounded-full toggle-container transition-colors duration-200">
                                    <div class="toggle-circle absolute left-1 top-1 bg-white w-4 h-4 rounded-full"></div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Trophy Case</h2>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="text-center">
                            <div class="w-16 h-16 mx-auto bg-gray-700 rounded-lg flex items-center justify-center mb-2">
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
                            <div class="w-16 h-16 mx-auto bg-gray-700 rounded-lg flex items-center justify-center mb-2">
                                <i class="fas fa-star text-2xl text-purple-500"></i>
                            </div>
                            <span class="text-sm">Legend</span>
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
                autoplay: 3000
            }).mount();
        });
    </script>
@endsection
