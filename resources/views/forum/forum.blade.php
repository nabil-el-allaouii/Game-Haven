@extends('layouts.app')

@section('title', 'Game Forum - Community Discussions')

@section('styles')
    <style>
        .thread-card:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }
    </style>
@endsection

@section('content')
    <main class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-6">
            <div class="lg:w-3/4">
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
                            </button>
                        </a>
                    </div>
                </div>

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
                                    <span>{{ $DiscussionThreads }} posts</span>
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
                                    <span>{{ $generalThread }} posts</span>
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
                                    <span>{{ $technicalThread }} posts</span>
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
                                    <span>{{ $communityThread }} posts</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold">Forum Threads</h2>
                    </div>

                    <div class="space-y-4">
                        @foreach ($threads as $thread)
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
                                            @if ($thread->game)
                                                <span
                                                    class="bg-yellow-500/20 text-yellow-400 text-xs px-2 py-0.5 rounded-full mr-2">{{ $thread->game->gameTitle }}</span>
                                            @endif
                                            <span
                                                class="bg-gray-700 text-gray-300 text-xs px-2 py-0.5 rounded-full">{{ $thread->category }}</span>
                                            <span
                                                class="bg-green-500/20 text-green-400 text-xs px-2 py-0.5 rounded-full ml-2">{{ $thread->type }}</span>
                                        </div>
                                        <a href="{{ route('thread.content', $thread->id) }}">
                                            <h3 class="font-semibold mb-1 hover:text-primary">
                                                {{ $thread->title }}
                                            </h3>
                                        </a>
                                        <p class="text-sm text-gray-400 mb-2 line-clamp-2">
                                            {{ Str::limit($thread->content, 50) }}
                                        </p>
                                        <div class="flex flex-wrap items-center text-xs text-gray-500">
                                            <span>Posted by <a href="#"
                                                    class="text-blue-400 hover:underline">{{ $thread->user->name }}</a></span>
                                            <span class="mx-2">•</span>
                                            <span>{{ $thread->created_at->diffForHumans() }}</span>
                                            <span class="mx-2">•</span>
                                            <div class="flex items-center">
                                                <div class="w-4 h-4 flex items-center justify-center mr-1">
                                                    <i class="ri-message-3-line"></i>
                                                </div>
                                                <span>94 replies</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div>
                            {{ $threads->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:w-1/4">
                <div class="bg-gray-800/50 rounded p-4 mb-6">
                    <h3 class="font-semibold mb-3">Game Forums</h3>
                    <ul class="space-y-2">
                        @foreach ($gamesWithThreads as $game)
                            <li>
                                <a href="#" class="flex items-center text-sm hover:text-primary">
                                    <div class="w-5 h-5 flex items-center justify-center mr-2">
                                        <i class="ri-gamepad-line"></i>
                                    </div>
                                    <span>{{ $game->gameTitle }}</span>
                                    <span class="ml-auto text-xs text-gray-500">{{ $game->threads_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <a href="#" class="text-primary text-xs hover:underline block mt-3">View All Games</a>
                </div>

                <div class="bg-gray-800/50 rounded p-4 mb-6">
                    <h3 class="font-semibold mb-3">Top Contributors</h3>
                    <ul class="space-y-3">
                        @foreach ($topContributors as $contributor)
                            <li>
                                <a href="#" class="flex items-center">
                                    <div class="w-8 h-8 rounded-full overflow-hidden mr-2">
                                        <img src="https://readdy.ai/api/search-image?query=gaming%20profile%20avatar%20with%20cyberpunk%20style%2C%20glowing%20details&width=100&height=100&seq=2&orientation=squarish"
                                            alt="User Avatar" class="w-full h-full object-cover" />
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">{{ $contributor->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $contributor->threads_count }} Contributions
                                        </p>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

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
                </div>
            </div>
        </div>
    </main>
@endsection
