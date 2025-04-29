<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - GameHaven</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .bg-gradient-to-r {
            background: linear-gradient(to right, var(--custom-color), #60a5fa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }
    </style>
</head>

<body class="bg-gray-900 text-white min-h-screen flex flex-col">
    <header class="border-b border-gray-800">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="/" class="flex items-center space-x-2">
                    <img src="https://ai-public.creatie.ai/gen_page/logo_placeholder.png" alt="GameHaven"
                        class="h-8 w-auto">
                    <span class="text-xl font-bold font-['Orbitron']">GameHaven</span>
                </a>
                <a href="/" class="text-gray-400 hover:text-custom transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Home
                </a>
            </div>
        </div>
    </header>

    <main class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <h2
                    class="text-4xl font-bold font-['Orbitron'] bg-gradient-to-r from-custom to-blue-400 bg-clip-text text-transparent">
                    Join GameHaven</h2>
                <p class="mt-2 text-gray-400">Your journey to gaming excellence starts here</p>
            </div>

            <div class="space-y-4">
                <button type="button"
                    class="w-full flex items-center justify-center px-4 py-3 border border-gray-700 !rounded-button bg-gray-800 hover:bg-gray-700 transition-colors">
                    <img src="https://www.google.com/favicon.ico" alt="Google" class="w-5 h-5 mr-3">
                    Continue with Google
                </button>
                <button type="button"
                    class="w-full flex items-center justify-center px-4 py-3 border border-gray-700 !rounded-button bg-gray-800 hover:bg-gray-700 transition-colors">
                    <i class="fab fa-discord text-[#5865F2] text-xl mr-3"></i>
                    Continue with Discord
                </button>
                <button type="button"
                    class="w-full flex items-center justify-center px-4 py-3 border border-gray-700 !rounded-button bg-gray-800 hover:bg-gray-700 transition-colors">
                    <i class="fab fa-steam text-white text-xl mr-3"></i>
                    Continue with Steam
                </button>
            </div>

            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-700"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-gray-900 text-gray-400">Or continue with</span>
                </div>
            </div>

            <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-6">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300">Username</label>
                        <input id="name" name="username" type="text" required
                            class="mt-1 block w-full bg-gray-800 border border-gray-700 !rounded-button focus:ring-2 focus:ring-custom focus:border-custom text-white @error('name') border-red-500 @enderror px-3 py-2"
                            value="{{ old('name') }}" autofocus>
                        @error('name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300">Email address</label>
                        <input id="email" name="email" type="email" required
                            class="mt-1 block w-full bg-gray-800 border border-gray-700 !rounded-button focus:ring-2 focus:ring-custom focus:border-custom text-white @error('email') border-red-500 @enderror px-3 py-2"
                            value="{{ old('email') }}">
                        @error('email')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                        <input id="password" name="password" type="password" required
                            class="mt-1 block w-full bg-gray-800 border border-gray-700 !rounded-button focus:ring-2 focus:ring-custom focus:border-custom text-white @error('password') border-red-500 @enderror px-3 py-2">
                        @error('password')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            

                <button type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent !rounded-button text-white bg-custom hover:bg-custom/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom font-medium">
                    Create Account
                </button>
            </form>

            <p class="text-center text-sm text-gray-400">
                Already have an account?
                <a href="/login" class="font-medium text-custom hover:text-custom-600">Sign in</a>
            </p>
        </div>
    </main>

    <footer class="border-t border-gray-800">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex justify-center space-x-6">
                <a href="#" class="text-sm text-gray-400 hover:text-custom">Privacy Policy</a>
                <a href="#" class="text-sm text-gray-400 hover:text-custom">Terms of Service</a>
                <a href="#" class="text-sm text-gray-400 hover:text-custom">Help Center</a>
            </div>
        </div>
    </footer>
</body>

</html>
