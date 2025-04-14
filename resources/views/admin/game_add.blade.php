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

<body class="bg-gray-50 min-h-screen admin-addgame">
    <nav class="bg-gray-900 text-white shadow-sm">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="h-8 w-auto" src="https://ai-public.creatie.ai/gen_page/logo_placeholder.png"
                            alt="GameHaven">
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="#"
                            class="border-custom text-white inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Games
                        </a>
                        <a href="#"
                            class="border-transparent text-gray-300 hover:text-white hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Users
                        </a>
                        <a href="#"
                            class="border-transparent text-gray-300 hover:text-white hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Analytics
                        </a>
                    </div>
                </div>
                <div class="flex items-center">
                    <button type="button" class="p-1 rounded-full text-gray-300 hover:text-white">
                        <span class="sr-only">View notifications</span>
                        <i class="fas fa-bell text-xl"></i>
                    </button>
                    <div class="ml-3 relative">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full"
                                src="https://ui-avatars.com/api/?name=Admin&background=6C3BF7&color=fff" alt="Admin">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-8xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-4 sm:px-0">
            <h1 class="text-2xl font-semibold text-gray-900">Add New Game</h1>

            <div class="mt-6 bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-medium text-gray-900">Import Games from API</h2>
                <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Game Name</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="test" type="text"
                                class="block w-full rounded-md border-gray-300 focus:ring-custom focus:border-custom sm:text-sm px-4 py-2 border-solid border-2"
                                placeholder="Elden Ring | minecraft...">
                        </div>
                    </div>
                </div>
                <button id="buttonFetch"
                    class="mt-4 rounded-md inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium text-white bg-custom hover:bg-custom/90 cursor-pointer">
                    <i class="fas fa-download mr-2"></i>
                    Import Game
                </button>
            </div>

            <div class="mt-6 bg-white rounded-lg shadow">
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900">Manual Game Entry</h2>
                    <form class="mt-6 space-y-6">
                        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label class="block text-sm font-medium text-gray-700">Game Title</label>
                                <div class="mt-1">
                                    <input type="text" name="title" id="title"
                                        class="block w-full rounded-md border-gray-300 focus:ring-custom focus:border-custom sm:text-sm px-4 py-2 border-solid border-2">
                                </div>
                            </div>

                            <div class="sm:col-span-6">
                                <label class="block text-sm font-medium text-gray-700">Cover Image</label>
                                <div class="mt-1 flex items-center">
                                    <input type="text" name="cover_image" id="image"
                                        class="block w-full rounded-md border-gray-300 focus:ring-custom focus:border-custom sm:text-sm px-4 py-2 border-solid border-2">
                                    <span class="ml-3">
                                        <button type="button"
                                            class="rounded-md inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                            <i class="fas fa-upload mr-2"></i>
                                            Upload
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="mt-6 bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-medium text-gray-900">Preview</h2>
                <div class="mt-4  rounded-lg p-4">
                    <div class="flex flex-col md:flex-row">
                        <div class="flex-shrink-0">
                            <img id="preview" class="h-48 w-48 object-cover rounded" src="img" alt="">
                        </div>
                        <div class="md:ml-4 flex-1 mt-4 md:mt-0">
                            <h3 id="preview-title" class="text-lg font-medium">Preview Title</h3>
                            <p class="mt-1 text-sm text-gray-500">Release Date: <span id="preview-release"></span></p>
                            <p class="mt-1 text-sm text-gray-500">Rating: <span id="preview-rating"></span>/5.0</p>
                            <div id="genres" class="mt-2 flex flex-wrap gap-2">

                            </div>
                            <input id="preview-price" class="border-none h-10 w-20 mt-5 focus:ring-0" type="text"
                                placeholder="Price: $"><span> $</span>
                            <div id="priceAlert"
                                class="hidden flex items-center bg-purple-400 text-white text-sm font-bold px-4 py-3 rounded-sm"
                                role="alert">
                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                                </svg>
                                <p>Please insert the price for the game manually</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-medium text-gray-900">Import Status</h2>
                <div class="mt-4">
                </div>
            </div>
        </div>
    </main>


    <div class="fixed bottom-6 right-6 flex flex-col space-y-2">
        <button
            class="rounded-md inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
            <i class="fas fa-save mr-2"></i>
            Save Draft
        </button>
        <button id="publish"
            class="rounded-md inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium text-white bg-custom hover:bg-custom/90">
            <i class="fas fa-paper-plane mr-2"></i>
            Publish Game
        </button>
        <button
            class="rounded-md inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
            <i class="fas fa-times mr-2"></i>
            Cancel
        </button>
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
                                'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-custom/10 text-custom';
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
