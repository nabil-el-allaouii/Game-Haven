<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Game - GameHaven Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --custom-color: #6366f1;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen font-sans">
    <header class="bg-white border-b border-gray-200 sticky top-0 z-10 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="h-8 w-auto" src="https://ai-public.creatie.ai/gen_page/logo_placeholder.png"
                            alt="GameHaven">
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="/admin/dashboard"
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
                            src="https://ui-avatars.com/api/?name=Admin&background=6366F1&color=fff" alt="Admin">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Edit Game</h1>
                <p class="mt-1 text-sm text-gray-500">Update game information in your library</p>
            </div>
            <a href="/admin"
                class="mt-4 md:mt-0 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Dashboard
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <h2 class="text-lg font-semibold text-gray-900">Game Details</h2>
                    </div>
                    <div class="px-6 py-5">
                        <form action="{{ Route('Game.update', $game->id) }}" id="editGameForm" class="space-y-6"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="gameTitle" class="block text-sm font-medium text-gray-700 mb-1">Game
                                    Title</label>
                                <input type="text" id="gameTitle" name="gameTitle"
                                    class="block w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 cursor-not-allowed sm:text-sm"
                                    placeholder="Enter game title" value="{{ $game->gameTitle ?? '' }}" readonly
                                    disabled>
                                <p class="mt-1 text-xs text-gray-500">Game title cannot be modified</p>
                            </div>

                            <div>
                                <label for="cover" class="block text-sm font-medium text-gray-700 mb-1">Cover Image
                                    URL</label>
                                <div class="flex">
                                    <input type="text" id="cover" name="cover"
                                        class="block w-full rounded-md px-4 py-2 border border-gray-300 bg-gray-50 cursor-not-allowed sm:text-sm"
                                        placeholder="https://example.com/image.jpg" value="{{ $game->cover ?? '' }}"
                                        readonly disabled>
                                </div>
                                <p class="mt-1 text-xs text-gray-500">Cover image cannot be modified</p>
                            </div>

                            <div>
                                <label for="release" class="block text-sm font-medium text-gray-700 mb-1">Release
                                    Date</label>
                                <input type="date" id="release" name="release"
                                    class="block w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 cursor-not-allowed sm:text-sm"
                                    value="{{ $game->release ?? '' }}" readonly disabled>
                                <p class="mt-1 text-xs text-gray-500">Release date cannot be modified</p>
                            </div>

                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price
                                    ($)</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500">$</span>
                                    </div>
                                    <input type="text" id="price" name="price"
                                        class="block w-full pl-7 pr-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        placeholder="0.00" value="{{ $game->price ?? '' }}">
                                </div>
                                <p class="mt-1 text-xs text-gray-500">You can modify the price of this game</p>
                            </div>

                            <div>
                                <label for="rating" class="block text-sm font-medium text-gray-700 mb-1">Rating
                                    (0-5)</label>
                                <input type="number" id="rating" name="rating" min="0" max="5"
                                    step="0.1"
                                    class="block w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 cursor-not-allowed sm:text-sm"
                                    placeholder="4.5" value="{{ $game->rating ?? '' }}" readonly disabled>
                                <p class="mt-1 text-xs text-gray-500">Rating cannot be modified</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Upload New
                                    Screenshots</label>
                                <div class="flex items-center justify-center w-full">
                                    <label for="screenshots"
                                        class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <i class="fas fa-cloud-upload-alt text-gray-400 text-2xl mb-2"></i>
                                            <p class="text-sm text-gray-500">
                                                <span class="font-semibold">Click to upload</span> or drag and drop
                                            </p>
                                            <p class="text-xs text-gray-500">PNG, JPG, WEBP (MAX. 2MB)</p>
                                        </div>
                                        <input id="screenshots" name="screenshots[]" type="file" class="hidden"
                                            multiple accept="image/*" />
                                    </label>
                                </div>

                                <div id="screenshot-preview-container" class="mt-4 hidden">
                                    <h3 class="text-sm font-medium text-gray-700 mb-2">Selected Images Preview</h3>
                                    <div id="screenshot-preview" class="grid grid-cols-2 sm:grid-cols-3 gap-3"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow overflow-hidden mb-8">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <h2 class="text-lg font-semibold text-gray-900">Current Screenshots</h2>
                    </div>
                    <div class="px-6 py-5">
                        <div class="space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                @foreach ($game->screenshots as $screenshot)
                                    <div class="relative rounded-md overflow-hidden group">
                                        <img src="{{ $screenshot->screenshot }}" alt="Screenshot 1"
                                            class="w-full h-32 object-cover transition-transform duration-300 group-hover:scale-110">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-indigo-900 to-transparent opacity-0 group-hover:opacity-90 flex items-center justify-center transition-all duration-300 ease-in-out">
                                            <form action="{{ Route('Screenshot.destroy', $screenshot->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="cursor-pointer transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 bg-white text-indigo-700 hover:text-red-600 p-2 rounded-lg shadow-lg flex items-center space-x-1">
                                                    <i class="fas fa-trash-alt"></i>
                                                    <span class="text-xs font-medium">Remove</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow overflow-hidden sticky top-20 mb-8">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <h2 class="text-lg font-semibold text-gray-900">Preview</h2>
                    </div>
                    <div class="p-0">
                        <div class="relative bg-gray-200 aspect-w-3 aspect-h-4">
                            <img id="preview" class="w-full h-full object-cover" src="{{ $game->cover ?? '' }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent opacity-70"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <h3 id="preview-title" class="text-xl font-bold text-white">
                                    {{ $game->gameTitle ?? 'Game Title' }}</h3>
                                <div class="flex items-center mt-1 text-white text-opacity-80 text-sm">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    <span id="preview-release">{{ $game->release ?? '-' }}</span>
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
                                <span id="preview-rating"
                                    class="ml-2 text-gray-700 font-medium">{{ $game->rating ?? '-' }}</span>
                                <span class="text-gray-700">/5.0</span>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Current Price</label>
                                <div class="flex items-center">
                                    <span
                                        class="text-2xl font-bold text-gray-900">${{ $game->price ?? '0.00' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div
        class="fixed bottom-0 inset-x-0 bg-white border-t border-gray-200 py-3 px-4 z-10 backdrop-blur-sm bg-opacity-90">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-end space-x-3">
                <form action="/admin">
                    <button id="cancel"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-times mr-2"></i>
                        Cancel
                    </button>
                </form>
                <button id="save" type="submit" form="editGameForm"
                    class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-save mr-2"></i>
                    Save Changes
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const titleInput = document.getElementById('gameTitle');
            const coverInput = document.getElementById('cover');
            const releaseInput = document.getElementById('release');
            const priceInput = document.getElementById('price');
            const ratingInput = document.getElementById('rating');

            const previewTitle = document.getElementById('preview-title');
            const previewImage = document.getElementById('preview');
            const previewRelease = document.getElementById('preview-release');
            const previewRating = document.getElementById('preview-rating');
            const previewPrice = document.querySelector('span.text-2xl.font-bold');

            priceInput.addEventListener('input', function() {
                if (previewPrice) {
                    previewPrice.textContent = '$' + (this.value || '0.00');
                }
            });

            document.getElementById('cancel').addEventListener('click', function() {
                window.location.href = '/admin/dashboard';
            });

            document.getElementById('editGameForm').addEventListener('submit', function(e) {
                console.log('Form submitted with price: ' + priceInput.value);
            });

            const screenshotUpload = document.getElementById('screenshots');
            const screenshotPreviewContainer = document.getElementById('screenshot-preview-container');
            const screenshotPreview = document.getElementById('screenshot-preview');

            screenshotUpload.addEventListener('change', function() {
                screenshotPreview.innerHTML = '';

                if (this.files.length > 0) {
                    screenshotPreviewContainer.classList.remove('hidden');

                    Array.from(this.files).forEach((file, index) => {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            const previewItem = document.createElement('div');
                            previewItem.className =
                                'relative rounded-md overflow-hidden group h-32';

                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.className = 'w-full h-full object-cover';
                            img.alt = file.name;

                            const overlay = document.createElement('div');
                            overlay.className =
                                'absolute bottom-0 left-0 right-0 p-2 bg-gradient-to-t from-black to-transparent text-white text-xs font-medium truncate';
                            overlay.textContent = file.name;

                            // Simple delete button
                            const removeBtn = document.createElement('button');
                            removeBtn.type = 'button';
                            removeBtn.className =
                                'absolute top-2 right-2 bg-white text-red-600 hover:bg-red-600 hover:text-white rounded-full w-7 h-7 flex items-center justify-center shadow-md transition-colors duration-200 font-bold text-lg';
                            removeBtn.innerHTML = '×';
                            removeBtn
                            removeBtn.addEventListener('click', function() {
                                previewItem.remove();
                                if (screenshotPreview.children.length === 0) {
                                    screenshotPreviewContainer.classList.add('hidden');
                                    screenshotUpload.value = '';
                                }
                            });

                            previewItem.appendChild(img);
                            previewItem.appendChild(overlay);
                            previewItem.appendChild(removeBtn);
                            screenshotPreview.appendChild(previewItem);
                        };

                        reader.readAsDataURL(file);
                    });
                } else {
                    screenshotPreviewContainer.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>
