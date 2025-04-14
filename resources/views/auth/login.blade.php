<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GameHaven</title>
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

<body class="bg-gray-900 min-h-screen font-['Inter']">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-3">
                    <img src="https://ai-public.creatie.ai/gen_page/logo_placeholder.png" alt="GameHaven"
                        class="h-8 w-auto">
                    <span
                        class="text-2xl font-['Orbitron'] font-bold bg-gradient-to-r from-custom to-blue-400 bg-clip-text text-transparent">GameHaven</span>
                </a>
            </div>
        </nav>
    </div>

    <main class="flex min-h-[calc(100vh-4rem)] items-center justify-center px-4 py-12">
        <div class="w-full max-w-md">
            <div class="bg-gray-800/80 backdrop-blur-sm rounded-lg shadow-xl p-8">
                <h2 class="text-2xl font-['Orbitron'] font-bold text-white mb-8 text-center">Welcome Back</h2>

                <form method="POST" action="" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                        <div class="mt-1 relative">
                            <input id="email" name="email" type="email" required
                                class="block w-full bg-gray-700 border border-gray-600 rounded-md py-3 px-4 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-custom focus:border-custom @error('email') border-red-500 @enderror"
                                value="{{ old('email') }}" autofocus>
                            @error('email')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                        <div class="mt-1 relative">
                            <input id="password" name="password" type="password" required
                                class="block w-full bg-gray-700 border border-gray-600 rounded-md py-3 px-4 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-custom focus:border-custom @error('password') border-red-500 @enderror">
                            @error('password')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox"
                                class="h-4 w-4 rounded border-gray-600 bg-gray-700 text-custom focus:ring-custom">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-300">Remember me</label>
                        </div>
                        <div class="text-sm">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="font-medium text-custom hover:text-custom/80">Forgot password?</a>
                            @endif
                        </div>
                    </div>

                    <button type="submit"
                        class="!rounded-button w-full flex justify-center py-3 px-4 border border-transparent font-medium text-white bg-custom hover:bg-custom/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom">
                        Sign in
                    </button>

                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-600"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-gray-800 text-gray-400">Or continue with</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        <button type="button"
                            class="!rounded-button w-full inline-flex justify-center py-2.5 px-4 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-sm font-medium text-gray-300 hover:bg-gray-600">
                            <i class="fab fa-discord text-lg"></i>
                        </button>
                        <button type="button"
                            class="!rounded-button w-full inline-flex justify-center py-2.5 px-4 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-sm font-medium text-gray-300 hover:bg-gray-600">
                            <i class="fab fa-google text-lg"></i>
                        </button>
                        <button type="button"
                            class="!rounded-button w-full inline-flex justify-center py-2.5 px-4 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-sm font-medium text-gray-300 hover:bg-gray-600">
                            <i class="fab fa-twitter text-lg"></i>
                        </button>
                    </div>
                </form>

                <p class="mt-8 text-center text-sm text-gray-400">
                    New to GameHaven?
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="font-medium text-custom hover:text-custom/80">Create an
                            account</a>
                    @endif
                </p>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800/30 mt-auto">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex justify-between items-center">
                <p class="text-sm text-gray-400">&copy; 2024 GameHaven. All rights reserved.</p>
                <div class="flex space-x-6">
                    <a href="#" class="text-sm text-gray-400 hover:text-gray-300">Terms</a>
                    <a href="#" class="text-sm text-gray-400 hover:text-gray-300">Privacy</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
