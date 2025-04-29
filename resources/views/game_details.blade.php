@extends('layouts.app')

@section('title', $game->gameTitle)

@section('styles')
    <style>
        .progress-bar {
            height: 8px;
            border-radius: 4px;
            background-color: #1f2937;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #6d28d9, #8b5cf6);
        }

        .content-container {
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>
@endsection

@section('content')
    <main class="pt-16 pb-12">
        <div class="flex justify-center items-center h-96 mb-8" id="loading-indicator">
            <div class="flex space-x-2">
                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                <div class="w-2 h-2 bg-white rounded-full animate-pulse delay-75"></div>
                <div class="w-2 h-2 bg-white rounded-full animate-pulse delay-150"></div>
            </div>
        </div>

        <div class="container mx-auto px-4 mb-6 max-w-6xl" id="game-content" style="display: none;">
            <div class="glide mb-6">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        @foreach ($game->screenshots as $screenshot)
                            <li class="glide__slide">
                                <div class="h-100 w-full bg-[#151b29] rounded-lg overflow-hidden">
                                    <img src="{{ $screenshot->screenshot }}" alt="Screenshot 1"
                                        class="w-full h-full object-cover">
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="glide__bullets flex justify-center mt-4" data-glide-el="controls[nav]">
                    @foreach ($game->screenshots as $screenshot)
                        <button class="glide__bullet w-3 h-3 bg-gray-500 rounded-full mx-1"
                            data-glide-dir="={{ $loop->index }}"></button>
                    @endforeach
                </div>
                <div class="glide__arrows" data-glide-el="controls">
                    <button
                        class="glide__arrow glide__arrow--left absolute top-1/2 left-4 -translate-y-1/2 w-10 h-10 rounded-full bg-black bg-opacity-50 flex items-center justify-center text-white"
                        data-glide-dir="<">
                        <i class="ri-arrow-left-s-line"></i>
                    </button>
                    <button
                        class="glide__arrow glide__arrow--right absolute top-1/2 right-4 -translate-y-1/2 w-10 h-10 rounded-full bg-black bg-opacity-50 flex items-center justify-center text-white"
                        data-glide-dir=">">
                        <i class="ri-arrow-right-s-line"></i>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-[#1a202c] rounded-lg p-6 shadow-lg">
                        <div class="flex flex-col md:flex-row md:items-center justify-between mb-4">
                            <div>
                                <h1 id="GameTitle" class="text-3xl font-bold mb-1">{{ $game->gameTitle }}</h1>
                            </div>
                            @can('user')
                                <div class="flex items-center space-x-3 mt-4 md:mt-0">
                                    <form
                                        action="{{ $game->favoriteByusers->contains(Auth::user()->id) ? route('game.unfavorite', $game->id) : route('favorite.store', $game->id) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="w-10 h-10 flex items-center justify-center border border-gray-600 rounded-button hover:bg-gray-700 cursor-pointer">
                                            <i
                                                class="{{ $game->favoriteByusers->contains(Auth::user()->id) ? 'ri-heart-fill text-red-500' : 'ri-heart-line' }}"></i>
                                        </button>
                                    </form>
                                </div>
                            @endcan
                        </div>

                        <div class="flex items-center space-x-6 mb-6">
                            <div class="text-sm text-gray-400">Release: {{ $game->release }}</div>
                            <div class="flex items-center">
                                <i class="ri-star-fill text-yellow-400"></i>
                                <span class="ml-1">{{ $game->rating }}/5</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#1a202c] rounded-lg p-6 shadow-lg">
                        <h2 class="text-xl font-bold mb-4">Reviews</h2>

                        <div class="mb-6 p-4 bg-[#151b29] rounded-lg">
                            @error('alr')
                                <div class="text-danger text-red-500 text-m">{{ $message }}</div>
                            @enderror
                            @can('user')
                                <h3 class="text-lg font-semibold mb-3">Write a Review</h3>
                                <form id="reviewForm" method="POST" action="{{ Route('game.review', $game->id) }}">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-300 mb-2">Rating</label>
                                        <div class="flex space-x-1">
                                            <button type="button" class="star-rating" data-rating="1">
                                                <i class="ri-star-line text-2xl text-yellow-400"></i>
                                            </button>
                                            <button type="button" class="star-rating" data-rating="2">
                                                <i class="ri-star-line text-2xl text-yellow-400"></i>
                                            </button>
                                            <button type="button" class="star-rating" data-rating="3">
                                                <i class="ri-star-line text-2xl text-yellow-400"></i>
                                            </button>
                                            <button type="button" class="star-rating" data-rating="4">
                                                <i class="ri-star-line text-2xl text-yellow-400"></i>
                                            </button>
                                            <button type="button" class="star-rating" data-rating="5">
                                                <i class="ri-star-line text-2xl text-yellow-400"></i>
                                            </button>
                                        </div>
                                        @error('rating')
                                            <div class="text-danger text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-300 mb-2">Your Review</label>
                                        <textarea
                                            class="w-full bg-[#1a202c] border border-gray-700 rounded-lg p-3 text-gray-300 focus:outline-none focus:border-indigo-500"
                                            rows="4" name="review" placeholder="Share your thoughts about this game..."></textarea>
                                        @error('review')
                                            <div class="text-danger text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="rating" id="rating" placeholder="rating here">
                                    <button type="submit"
                                        class="cursor-pointer bg-primary hover:bg-purple-700 text-white px-4 py-2 rounded-button">
                                        Submit Review
                                    </button>
                                </form>
                            @endcan
                        </div>

                        <div class="space-y-4">
                            @foreach ($game->reviews as $review)
                                <div
                                    class="bg-gradient-to-br from-[#1a202c] to-[#161e2b] rounded-lg shadow-lg p-4 border border-gray-800 hover:border-gray-700 transition-all">
                                    <div class="flex items-center justify-between mb-3">
                                        <div class="flex items-center gap-2">
                                            <div class="w-1 h-5 bg-primary rounded-full"></div>
                                            <span
                                                class="font-semibold text-white">{{ $review->user->name ?? 'Anonymous User' }}</span>
                                            <span
                                                class="text-xs text-gray-500">{{ $review->created_at ? $review->created_at->diffForHumans() : 'Recently' }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="ri-star-fill text-yellow-400"></i>
                                            <span class="ml-1">{{ $review->rating }}/5</span>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <p class="text-gray-300 leading-relaxed pl-3 border-l border-gray-700">
                                            {{ $review->review }}
                                        </p>
                                    </div>

                                    <div class="flex justify-between items-center border-t border-gray-800 pt-3 mt-3">
                                        <div class="text-xs text-gray-500 flex items-center gap-2">
                                            <i class="ri-time-line"></i>
                                            <span>{{ $review->created_at ? $review->created_at->format('M d, Y') : 'Recent review' }}</span>
                                        </div>

                                        @if ((auth()->check() && auth()->user()->id == $review->user_id) || (auth()->user->role = 'admin'))
                                            <form method="POST" action="{{ route('review.destroy', $review->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-gray-400 hover:text-red-400 transition-colors text-sm flex items-center bg-[#151b29] px-3 py-1 rounded-full">
                                                    <i class="ri-delete-bin-line mr-1"></i> Delete
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                            @if (count($game->reviews) == 0)
                                <div
                                    class="text-center py-8 bg-gradient-to-b from-[#1a202c] to-[#161e2b] rounded-lg border border-gray-800">
                                    <p class="text-gray-400 mb-1">No reviews yet</p>
                                    <p class="text-xs text-gray-500">Share your experience with this game!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-[#1a202c] rounded-lg p-6 shadow-lg">
                        <h2 class="text-xl font-bold mb-4">System Requirements</h2>

                        <div class="mb-6">
                            @if ($requirements && isset($requirements['info']['minimum']))
                                {!! $requirements['info']['minimum'] !!}
                            @endif
                        </div>

                        <div>
                            @if ($requirements && isset($requirements['info']['recommended']))
                                {!! $requirements['info']['recommended'] !!}
                            @endif
                        </div>
                    </div>

                    <div class="bg-[#1a202c] rounded-lg p-6 shadow-lg">
                        <h2 class="text-xl font-bold mb-4">Similar Games</h2>

                        <div class="space-y-4">
                            @foreach ($similarGames as $similar)
                                <a href="/game/{{ $similar->id }}">
                                    <div
                                        class="group bg-[#151b29] rounded-lg overflow-hidden hover:bg-[#1c2438] transition mt-10">
                                        <div class="relative h-32 bg-gray-800">
                                            <img src="{{ $similar->cover }}" alt="The Witcher 3: Wild Hunt"
                                                class="w-full h-full object-cover">
                                        </div>
                                        <div class="p-3">
                                            <h3 class="font-medium mb-1">{{ $similar->gameTitle }}</h3>
                                            <p class="text-gray-400">${{ $similar->price }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                document.getElementById("loading-indicator").style.display = "none";
                document.getElementById("game-content").style.display = "block";

                new Glide('.glide', {
                    type: 'carousel',
                    perView: 1,
                    autoplay: 5000
                }).mount();
            }, 1000);

            const starButtons = document.querySelectorAll('.star-rating');
            let ratevalue = document.getElementById('rating');
            starButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const rating = parseInt(this.dataset.rating);
                    starButtons.forEach((star, index) => {
                        if (index < rating) {
                            star.querySelector('i').classList.remove('ri-star-line');
                            star.querySelector('i').classList.add('ri-star-fill');
                        } else {
                            star.querySelector('i').classList.remove('ri-star-fill');
                            star.querySelector('i').classList.add('ri-star-line');
                        }
                        ratevalue.value = rating;
                    });
                });
            });
        });
    </script>
@endsection
