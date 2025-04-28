<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'GameHaven')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/css/glide.core.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/css/glide.theme.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/glide.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')
</head>

<body class="bg-gray-900 text-white min-h-screen">
    <header class="bg-gray-800 py-4 px-6 flex items-center justify-between">
        <div class="flex items-center">
            <a href="/" class="text-purple-600 text-2xl font-['Pacifico'] mr-10">GameHaven</a>
            <nav class="flex space-x-8">
                <a href="/" class="text-white font-medium">Home</a>
                <a href="/games" class="text-gray-400 hover:text-white">Games</a>
                <a href="/forum" class="text-gray-400 hover:text-white">Forum</a>
            </nav>
        </div>
        <div class="flex items-center space-x-4">
            @auth
                <div class="flex items-center space-x-4">
                    <a href="/dashboard"
                        class="bg-purple-600 text-white px-4 py-2 rounded-md hover:bg-purple-700 whitespace-nowrap">
                        <div class="flex items-center">
                            <i class="fas fa-user mr-2"></i>
                            Dashboard
                        </div>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-400 hover:text-white">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="bg-gray-900 text-white px-4 py-2 rounded-md hover:bg-gray-700 whitespace-nowrap">
                    <div class="flex items-center">
                        <i class="fas fa-user mr-2"></i>
                        Sign In
                    </div>
                </a>
            @endauth
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-900 py-12 mt-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <a href="/" class="text-purple-600 text-2xl font-['Pacifico'] block mb-4">GameHaven</a>
                    <p class="text-gray-400 text-sm">
                        Your ultimate destination for digital gaming entertainment.
                    </p>
                </div>
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

    @yield('scripts')
</body>

</html>
