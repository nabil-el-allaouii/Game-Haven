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

<body class="bg-gray-900 text-white min-h-screen font-sans">

    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-white">Add New Game</h1>
                <p class="mt-1 text-sm text-gray-400">Add a new game to your library using the API or manual input.</p>
            </div>
            <a href="/admin"
                class="mt-4 md:mt-0 inline-flex items-center px-4 py-2 border border-[#3A4049] shadow-sm text-sm font-medium rounded-md text-gray-300 bg-[#1e293b] hover:bg-[#2d3748] transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Dashboard
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Import Card -->
                <div class="bg-[#1e293b] rounded-lg shadow overflow-hidden">
                    <div class="border-b border-[#3A4049] px-6 py-4">
                        <h2 class="text-lg font-semibold text-white">Import Game from API</h2>
                    </div>
                    <div class="px-6 py-5">
                        <div class="space-y-4">
                            <div>
                                <label for="test" class="block text-sm font-medium text-gray-300 mb-1">Game
                                    Title</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-gamepad text-gray-400"></i>
                                    </div>
                                    <input id="test" type="text"
                                        class="block w-full pl-10 pr-4 py-2 border border-[#3A4049] rounded-md bg-[#283548] focus:ring-[#312e81] focus:border-[#312e81] sm:text-sm text-white"
                                        placeholder="Enter game title (e.g., Elden Ring, Minecraft)">
                                </div>
                                <p class="mt-2 text-xs text-gray-400 flex items-start">
                                    <i class="fas fa-info-circle mt-0.5 mr-1"></i>
                                    <span>Search for a game to import details automatically from our database.</span>
                                </p>
                            </div>
                            <div class="flex justify-end">
                                <button id="buttonFetch"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#312e81] hover:bg-[#4338ca] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#312e81] transition-colors">
                                    <i class="fas fa-download mr-2"></i>
                                    Import Game
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Manual Entry Card -->
                <div class="bg-[#1e293b] rounded-lg shadow overflow-hidden">
                    <div class="border-b border-[#3A4049] px-6 py-4">
                        <h2 class="text-lg font-semibold text-white">Manual Game Entry</h2>
                    </div>
                    <div class="px-6 py-5">
                        <form class="space-y-5">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-300 mb-1">Game
                                    Title</label>
                                <input type="text" id="title" name="title"
                                    class="block w-full px-4 py-2 border border-[#3A4049] rounded-md bg-[#283548] focus:ring-[#312e81] focus:border-[#312e81] sm:text-sm text-white"
                                    placeholder="Enter game title">
                            </div>
                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-300 mb-1">Cover Image
                                    URL</label>
                                <div class="flex">
                                    <input type="text" id="image" name="cover_image"
                                        class="block w-full rounded-l-md px-4 py-2 border border-[#3A4049] bg-[#283548] focus:ring-[#312e81] focus:border-[#312e81] sm:text-sm text-white"
                                        placeholder="https://example.com/image.jpg">
                                    <button type="button"
                                        class="inline-flex items-center px-4 py-2 border border-l-0 border-[#3A4049] rounded-r-md bg-[#283548] text-sm font-medium text-gray-300 hover:bg-[#2d3748]">
                                        <i class="fas fa-upload mr-2"></i>
                                        Upload
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column - Preview -->
            <div class="lg:col-span-1">
                <div class="bg-[#1e293b] rounded-lg shadow overflow-hidden sticky top-20">
                    <div class="border-b border-[#3A4049] px-6 py-4">
                        <h2 class="text-lg font-semibold text-white">Preview</h2>
                    </div>
                    <div class="p-0">
                        <div class="relative bg-[#283548] aspect-w-3 aspect-h-4">
                            <img id="preview" class="w-full h-full object-cover" src=""
                                onerror="this.src='https://placehold.co/400x500/1e293b/9ca3af?text=Game+Cover';this.onerror='';">
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
                                <span id="preview-rating" class="ml-2 text-gray-300 font-medium">-</span>
                                <span class="text-gray-300">/5.0</span>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-1">Genre Tags</label>
                                <div id="genres" class="flex flex-wrap gap-2">
                                </div>
                            </div>

                            <div>
                                <label for="preview-price"
                                    class="block text-sm font-medium text-gray-300 mb-1">Price</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-400">$</span>
                                    </div>
                                    <input id="preview-price" type="text"
                                        class="block w-full pl-7 pr-3 py-2 border border-[#3A4049] rounded-md bg-[#283548] focus:ring-[#312e81] focus:border-[#312e81] sm:text-sm text-white"
                                        placeholder="0.00">
                                </div>
                            </div>

                            <div id="priceAlert"
                                class="hidden bg-blue-900 text-blue-300 rounded-md p-3 text-sm flex items-start">
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
        class="fixed bottom-0 inset-x-0 bg-[#1e293b] border-t border-[#3A4049] py-3 px-4 z-10 backdrop-blur-sm bg-opacity-90">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-end space-x-3">
                <button
                    class="inline-flex items-center px-4 py-2 border border-[#3A4049] shadow-sm text-sm font-medium rounded-md text-gray-300 bg-[#1e293b] hover:bg-[#2d3748] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#312e81]">
                    <i class="fas fa-save mr-2"></i>
                    Save Draft
                </button>
                <button id="publish"
                    class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-[#312e81] hover:bg-[#4338ca] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#312e81]">
                    <i class="fas fa-paper-plane mr-2"></i>
                    Publish Game
                </button>
                <button
                    class="inline-flex items-center px-4 py-2 border border-[#3A4049] shadow-sm text-sm font-medium rounded-md text-gray-300 bg-[#1e293b] hover:bg-[#2d3748] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#312e81]">
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
                                'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-900 text-indigo-300';
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
                            cover: preview.src,
                            platforms: game.platforms.map(p => p.platform.name)
                        }).catch(error => {
                            swal("ERROR!", error.response.data.message, "error");
                            return;
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
