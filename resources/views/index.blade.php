<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHaven - Your Gateway to Gaming Excellence</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/css/glide.core.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/css/glide.theme.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/glide.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
</head>

<body class="bg-gray-900 text-white min-h-screen flex flex-col">
    <header class="fixed w-full z-50 bg-gray-900/95 backdrop-blur-sm border-b border-gray-800">
        <nav class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="#" class="flex-shrink-0">
                        <img class="h-8 w-auto" src="https://ai-public.creatie.ai/gen_page/logo_placeholder.png"
                            alt="GameHaven">
                    </a>
                    <div class="hidden md:block ml-10">
                        <div class="flex items-center space-x-8">
                            <a href="#"
                                class="text-custom hover:text-custom/80 px-3 py-2 text-sm font-medium">Browse</a>
                            <a href="#"
                                class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">Library</a>
                            <a href="#"
                                class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">Community</a>
                        </div>
                    </div>
                </div>
                <a href=""><button
                        class="!rounded-button bg-custom hover:bg-custom/90 px-4 py-2 text-sm font-medium text-white">Sign
                        In</button></a>
            </div>
        </nav>
    </header>

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
                            <li class="glide__slide">
                                <div class="relative rounded-lg overflow-hidden">
                                    <img src="https://creatie.ai/ai/api/search-image?query=A stunning 4K screenshot from a next-gen action RPG game featuring an epic battle scene with dramatic lighting, particle effects, and detailed environment. The scene shows a warrior facing a mythical creature in a fantasy setting with a dark atmospheric background&width=400&height=225&orientation=landscape&flag=255f5f82-4d08-49e5-b396-66dbe3246360"
                                        alt="Game 1" class="w-full h-64 object-cover">
                                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black">
                                        <h3 class="text-lg font-bold">Eternal Legends</h3>
                                        <p class="text-sm text-gray-300">Action RPG</p>
                                    </div>
                                </div>
                            </li>
                            <li class="glide__slide">
                                <div class="relative rounded-lg overflow-hidden">
                                    <img src="https://creatie.ai/ai/api/search-image?query=A breathtaking racing game screenshot showing a hypercar racing through a neon-lit futuristic city at night, with ray-traced reflections and dynamic weather effects. The scene captures the speed and intensity of high-stakes street racing&width=400&height=225&orientation=landscape&flag=8b349fd0-43bd-4327-ad4d-eab725f2a05d"
                                        alt="Game 2" class="w-full h-64 object-cover">
                                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black">
                                        <h3 class="text-lg font-bold">Speed Masters</h3>
                                        <p class="text-sm text-gray-300">Racing</p>
                                    </div>
                                </div>
                            </li>
                            <li class="glide__slide">
                                <div class="relative rounded-lg overflow-hidden">
                                    <img src="https://creatie.ai/ai/api/search-image?query=A strategic war game screenshot showing an expansive battlefield with armies clashing, detailed unit formations, and impressive special effects. The scene demonstrates advanced graphics with realistic terrain and atmospheric lighting&width=400&height=225&orientation=landscape&flag=1724610e-a8c2-489c-93bf-414c2b6921c4"
                                        alt="Game 3" class="w-full h-64 object-cover">
                                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black">
                                        <h3 class="text-lg font-bold">Empire Wars</h3>
                                        <p class="text-sm text-gray-300">Strategy</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="glide__bullets" data-glide-el="controls[nav]">
                        <button class="glide__bullet" data-glide-dir="=0"></button>
                        <button class="glide__bullet" data-glide-dir="=1"></button>
                        <button class="glide__bullet" data-glide-dir="=2"></button>
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
                    <button
                        class="!rounded-button bg-gray-800 hover:bg-gray-700 px-6 py-3 text-sm font-medium">RPG</button>
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

    <footer class="bg-gray-900 border-t border-gray-800">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">COMPANY</h3>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-gray-300 hover:text-white">About</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Careers</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Press</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">SUPPORT</h3>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-gray-300 hover:text-white">Help Center</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Safety</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Terms</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">SOCIAL</h3>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-gray-300 hover:text-white flex items-center gap-2"><i
                                    class="fab fa-discord"></i> Discord</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white flex items-center gap-2"><i
                                    class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white flex items-center gap-2"><i
                                    class="fab fa-instagram"></i> Instagram</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">LEGAL</h3>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-gray-300 hover:text-white">Privacy</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Terms</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-800">
                <p class="text-gray-400 text-sm text-center">&copy; 2024 GameHaven. All rights reserved.</p>
            </div>
        </div>
    </footer>

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
</body>

</html>
