<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $game->gameTitle }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.theme.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        body {
            background-color: #111827;
            color: #f3f4f6;
            font-family: 'Inter', sans-serif;
        }

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
</head>

<body>
    <header class="fixed top-0 left-0 right-0 z-50 bg-[#111827] border-b border-gray-800">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="/"
                        class="flex items-center font-['Pacifico'] text-primary text-2xl mr-8">GameHaven</a>
                    <nav class="hidden md:flex space-x-8">
                        <a href="/" class="text-indigo-400 border-b-2 border-indigo-400 px-1 py-5">Store</a>
                        <a href="#" class="text-gray-300 hover:text-white px-1 py-5">Library</a>
                        <a href="#" class="text-gray-300 hover:text-white px-1 py-5">Community</a>
                    </nav>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="w-10 h-10 flex items-center justify-center text-gray-300 hover:text-white">
                        <i class="ri-search-line ri-lg"></i>
                    </button>
                    <button class="w-10 h-10 flex items-center justify-center text-gray-300 hover:text-white">
                        <i class="ri-shopping-cart-line ri-lg"></i>
                    </button>
                    <div class="w-8 h-8 bg-gray-700 rounded-full"></div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="pt-16 pb-12">
        <!-- Loading Indicator -->
        <div class="flex justify-center items-center h-96 mb-8" id="loading-indicator">
            <div class="flex space-x-2">
                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                <div class="w-2 h-2 bg-white rounded-full animate-pulse delay-75"></div>
                <div class="w-2 h-2 bg-white rounded-full animate-pulse delay-150"></div>
            </div>
        </div>

        <!-- Game Screenshots Slider -->
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

            <!-- Game Details Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Game Info and Reviews (Left and Middle) -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Game Title and Purchase -->
                    <div class="bg-[#1a202c] rounded-lg p-6 shadow-lg">
                        <div class="flex flex-col md:flex-row md:items-center justify-between mb-4">
                            <div>
                                <h1 id="GameTitle" class="text-3xl font-bold mb-1">{{ $game->gameTitle }}</h1>
                                <p class="text-gray-400 text-sm">
                                    CD PROJEKT RED • Action RPG
                                </p>
                            </div>
                            <div class="flex items-center space-x-3 mt-4 md:mt-0">
                                <button
                                    class="bg-primary hover:bg-purple-700 text-white px-4 py-2 rounded-button flex items-center whitespace-nowrap">
                                    <i class="ri-shopping-cart-line mr-2"></i> {{ $game->price }}
                                </button>
                                <button
                                    class="w-10 h-10 flex items-center justify-center border border-gray-600 rounded-button hover:bg-gray-700">
                                    <i class="ri-heart-line"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center space-x-6 mb-6">
                            <div class="text-sm text-gray-400">Release: Dec 10, 2020</div>
                            <div class="flex items-center text-sm text-gray-400">
                                <i class="ri-user-line mr-1"></i> Single-player
                            </div>
                            <div class="flex items-center">
                                <i class="ri-star-fill text-yellow-400"></i>
                                <span class="ml-1">{{ $game->rating }}/5</span>
                            </div>
                        </div>

                    </div>


                    <div class="bg-[#1a202c] rounded-lg p-6 shadow-lg">
                        <h2 class="text-xl font-bold mb-4">Reviews</h2>

                        <div class="mb-6 p-4 bg-[#151b29] rounded-lg">
                            <h3 class="text-lg font-semibold mb-3">Write a Review</h3>
                            <form id="reviewForm" method="POST" action="#">
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
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Your Review</label>
                                    <textarea
                                        class="w-full bg-[#1a202c] border border-gray-700 rounded-lg p-3 text-gray-300 focus:outline-none focus:border-indigo-500"
                                        rows="4" name="review" placeholder="Share your thoughts about this game..."></textarea>
                                </div>
                                <input type="hidden" name="rating" id="rating" placeholder="rating here">
                                <button type="submit"
                                    class="cursor-pointer bg-primary hover:bg-purple-700 text-white px-4 py-2 rounded-button">
                                    Submit Review
                                </button>
                            </form>
                        </div>

                        <div class="space-y-6">
                            <!-- Review 1 -->
                            <div class="border-b border-gray-700 pb-6">
                                <div class="flex justify-between mb-2">
                                    <div class="font-medium">John Doe</div>
                                    <div class="flex">
                                        <i class="ri-star-fill text-yellow-400"></i>
                                        <i class="ri-star-fill text-yellow-400"></i>
                                        <i class="ri-star-fill text-yellow-400"></i>
                                        <i class="ri-star-fill text-yellow-400"></i>
                                        <i class="ri-star-half-fill text-yellow-400"></i>
                                    </div>
                                </div>
                                <p class="text-gray-300 mb-3">
                                    An incredible gaming experience that pushes the boundaries
                                    of what's possible in open-world RPGs. The attention to
                                    detail in Night City is breathtaking.
                                </p>
                            </div>

                            <!-- Review 2 -->
                            <div>
                                <div class="flex justify-between mb-2">
                                    <div class="font-medium">Sarah Smith</div>
                                    <div class="flex">
                                        <i class="ri-star-fill text-yellow-400"></i>
                                        <i class="ri-star-fill text-yellow-400"></i>
                                        <i class="ri-star-fill text-yellow-400"></i>
                                        <i class="ri-star-fill text-yellow-400"></i>
                                        <i class="ri-star-line text-yellow-400"></i>
                                    </div>
                                </div>
                                <p class="text-gray-300 mb-3">
                                    The character customization and story choices are amazing.
                                    Each playthrough feels unique and meaningful.
                                </p>
                            </div>
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


    <footer class="bg-[#0f1623] py-12 border-t border-gray-800">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <div>
                    <a href="/"
                        class="flex items-center font-['Pacifico'] text-primary text-2xl mb-4">GameHaven</a>
                    <p class="text-gray-400 mb-4">
                        Your ultimate destination for digital entertainment and gaming
                        experiences.
                    </p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">SUPPORT</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white">Help Center</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white">Community</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white">Contact Us</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">LEGAL</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white">Terms of Service</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white">Cookie Policy</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-gray-800">
                <div class="flex flex-col md:flex-row md:justify-between items-center">
                    <div class="mb-4 md:mb-0">
                        <p class="text-gray-500">
                            © 2024 GameHaven. All rights reserved.
                        </p>
                    </div>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="ri-twitter-fill ri-lg"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="ri-facebook-fill ri-lg"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="ri-instagram-fill ri-lg"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="ri-youtube-fill ri-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

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

            const heartButton = document.querySelector(".ri-heart-line").parentElement;
            heartButton.addEventListener("click", function() {
                const icon = this.querySelector("i");
                if (icon.classList.contains("ri-heart-line")) {
                    icon.classList.remove("ri-heart-line");
                    icon.classList.add("ri-heart-fill");
                    icon.classList.add("text-red-500");
                } else {
                    icon.classList.remove("ri-heart-fill");
                    icon.classList.remove("text-red-500");
                    icon.classList.add("ri-heart-line");
                }
            });

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
        // let gameTitle = document.getElementById('GameTitle');
        // axios.get('/applist.json')
        //     .then(file => {
        //         const data = file.data.applist.apps;
        //         const match = Object.values(data).find(g => g.name.toLowerCase() === gameTitle.innerText.toLowerCase())
        //         const appid = match.appid;  

        //         axios.get('https://store.steampowered.com/api/appdetails?appids='+appid)
        //             .then(response => {
        //                 console.log(response);
        //             })
        //     })
    </script>
</body>

</html>
