<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Game - GameHaven Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --custom-color: #6C3BF7;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen font-sans">
    <!-- Top Navigation -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-10 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="h-8 w-auto" src="https://ai-public.creatie.ai/gen_page/logo_placeholder.png"
                            alt="GameHaven">
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="#"
                            class="border-indigo-600 text-indigo-600 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Games
                        </a>
                        <a href="#"
                            class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Users
                        </a>
                        <a href="#"
                            class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Analytics
                        </a>
                    </div>
                </div>
                <div class="flex items-center">
                    <button type="button" class="p-1 rounded-full text-gray-400 hover:text-gray-500 mr-3">
                        <span class="sr-only">View notifications</span>
                        <i class="fas fa-bell"></i>
                    </button>
                    <div class="relative">
                        <img class="h-9 w-9 rounded-full ring-2 ring-white shadow"
                            src="https://ui-avatars.com/api/?name=Admin&background=6C3BF7&color=fff" alt="Admin">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Add New Game</h1>
                <p class="mt-1 text-sm text-gray-500">Add a new game to your library using the API or manual input.</p>
            </div>
            <a href="/admin"
                class="mt-4 md:mt-0 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Dashboard
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Import Card -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <h2 class="text-lg font-semibold text-gray-900">Import Game from API</h2>
                    </div>
                    <div class="px-6 py-5">
                        <div class="space-y-4">
                            <div>
                                <label for="test" class="block text-sm font-medium text-gray-700 mb-1">Game
                                    Title</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-gamepad text-gray-400"></i>
                                    </div>
                                    <input id="test" type="text"
                                        class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        placeholder="Enter game title (e.g., Elden Ring, Minecraft)">
                                </div>
                                <p class="mt-2 text-xs text-gray-500 flex items-start">
                                    <i class="fas fa-info-circle mt-0.5 mr-1"></i>
                                    <span>Search for a game to import details automatically from our database.</span>
                                </p>
                            </div>
                            <div class="flex justify-end">
                                <button id="buttonFetch"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                                    <i class="fas fa-download mr-2"></i>
                                    Import Game
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Manual Entry Card -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <h2 class="text-lg font-semibold text-gray-900">Manual Game Entry</h2>
                    </div>
                    <div class="px-6 py-5">
                        <form class="space-y-5">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Game
                                    Title</label>
                                <input type="text" id="title" name="title"
                                    class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="Enter game title">
                            </div>
                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Cover Image
                                    URL</label>
                                <div class="flex">
                                    <input type="text" id="image" name="cover_image"
                                        class="block w-full rounded-l-md px-4 py-2 border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        placeholder="https://example.com/image.jpg">
                                    <button type="button"
                                        class="inline-flex items-center px-4 py-2 border border-l-0 border-gray-300 rounded-r-md bg-gray-50 text-sm font-medium text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-upload mr-2"></i>
                                        Upload
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Import Status -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <h2 class="text-lg font-semibold text-gray-900">Import Status</h2>
                    </div>
                    <div class="px-6 py-5">
                        <div class="bg-gray-50 rounded-lg border border-gray-200 p-6 text-center">
                            <div class="flex flex-col items-center justify-center py-4">
                                <i class="fas fa-database text-gray-400 text-3xl mb-2"></i>
                                <p class="text-sm text-gray-700">No game import initiated yet</p>
                                <p class="text-xs mt-1 text-gray-500">Game data will appear here once imported</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Preview -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow overflow-hidden sticky top-20">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <h2 class="text-lg font-semibold text-gray-900">Preview</h2>
                    </div>
                    <div class="p-0">
                        <div class="relative bg-gray-200 aspect-w-3 aspect-h-4">
                            <img id="preview" class="w-full h-full object-cover" src=""
                                onerror="this.src='https://placehold.co/400x500/e5e7eb/9ca3af?text=Game+Cover';this.onerror='';">
                            <!-- Gradient overlay for text readability -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent opacity-70"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <h3 id="preview-title" class="text-xl font-bold text-white">Preview Title</h3>
                                <div class="flex items-center mt-1 text-white text-opacity-80 text-sm">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    <span id="preview-release">-</span>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 space-y-5">
                            <div class="flex items-center">
                                <div class="flex items-center text-amber-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span id="preview-rating" class="ml-2 text-gray-700 font-medium">-</span>
                                <span class="text-gray-700">/5.0</span>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Genre Tags</label>
                                <div id="genres" class="flex flex-wrap gap-2">
                                    <!-- Genres will be added dynamically -->
                                </div>
                            </div>

                            <div>
                                <label for="preview-price"
                                    class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500">$</span>
                                    </div>
                                    <input id="preview-price" type="text"
                                        class="block w-full pl-7 pr-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        placeholder="0.00">
                                </div>
                            </div>

                            <div id="priceAlert"
                                class="hidden bg-blue-50 text-blue-800 rounded-md p-3 text-sm flex items-start">
                                <i class="fas fa-info-circle mt-0.5 mr-2"></i>
                                <span>Please enter the price for this game manually.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Action Buttons -->
    <div
        class="fixed bottom-0 inset-x-0 bg-white border-t border-gray-200 py-3 px-4 z-10 backdrop-blur-sm bg-opacity-90">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-end space-x-3">
                <button
                    class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-save mr-2"></i>
                    Save Draft
                </button>
                <button id="publish"
                    class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-paper-plane mr-2"></i>
                    Publish Game
                </button>
                <button
                    class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-times mr-2"></i>
                    Cancel
                </button>
            </div>
        </div>
    </div>

    <script>
        let buttonFetch = document.getElementById('buttonFetch');
        let title = document.getElementById('title');
        let back = document.getElementById('image');
        let preview = document.getElementById('preview');
        let previewTitle = document.getElementById('preview-title');
        let previewRelease = document.getElementById('preview-release');
        let previewRating = document.getElementById('preview-rating');
        let gametitle = document.getElementById('test');
        var gameprice = document.getElementById('preview-price');
        let genres = document.getElementById('genres');
        let publish = document.getElementById('publish');
        let alert = document.getElementById('priceAlert');

        function isEmpty(str) {
            return (!str || str === '');
        }

        buttonFetch.onclick = function() {

            axios.get('https://api.rawg.io/api/games', {
                    params: {
                        key: '323cb675cba1456f8d8c5b5418fe50be',
                        search: gametitle.value
                    }
                })
                .then(response => {
                    const game = response.data.results[0];
                    if (game) {
                        console.log(game);

                        title.value = game.name;
                        back.value = game.background_image
                        preview.src = back.value;
                        previewTitle.innerText = game.name
                        previewRelease.innerText = game.released
                        gametitle.value = game.name
                        previewRating.innerText = (game.rating).toFixed(1);
                        genres.innerText = '';
                        game['genres'].forEach(genre => {
                            var span = document.createElement("span");
                            span.innerText = genre["name"];
                            span.className =
                                'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800';
                            genres.appendChild(span);
                        });
                        axios.get('/steamspy_data.json')
                            .then(file => {
                                const fileGames = file.data;
                                const matched = Object.values(fileGames).find(g => g.name.toLowerCase() === game
                                    .name.toLowerCase());
                                if (matched) {
                                    const price = (matched['price'] / 100).toFixed(2);
                                    gameprice.value = price;
                                } else {
                                    gameprice.value = '';
                                    alert.classList.remove('hidden');
                                }
                            })
                    }

                    publish.onclick = function() {
                        if (isEmpty(gameprice.value) || isEmpty(game.name) || isEmpty(game.released) || isEmpty(
                                preview.src) || isEmpty(previewRating.innerText) || isEmpty(game.genres) ||
                            isEmpty(game.short_screenshots)) {
                            swal("ERROR!", "make sure all the fields are filled!", "error");
                            return;
                        }
                        axios.post('/add-game', {
                            name: game.name,
                            releaseDate: game.released,
                            genres: game.genres.map(g => g.name),
                            screenshots: game.short_screenshots.map(s => s.image),
                            price: gameprice.value,
                            rating: previewRating.innerText,
                            cover: preview.src
                        })
                        swal("Success!", "The Game Has Been Successfully Published!", "success")
                            .then(() => {
                                location.reload();
                            });
                    }

                })
        }
    </script>
</body>

</html>
