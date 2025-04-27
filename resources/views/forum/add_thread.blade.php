<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create New Thread - Forum</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        body {
            background-color: #1C2128;
            color: #fff;
        }

        .editor-toolbar button {
            background-color: #252B34;
            border: 1px solid #3A4049;
            color: #fff;
            padding: 4px 8px;
            margin-right: 4px;
        }

        .editor-toolbar button:hover {
            background-color: #3A4049;
        }

        .tag-item {
            background-color: #252B34;
            padding: 4px 8px;
            border-radius: 4px;
            display: inline-flex;
            align-items: center;
            margin-right: 6px;
            margin-bottom: 6px;
        }

        .tag-item .remove {
            margin-left: 6px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header class="bg-[#131820] py-3 px-6 flex items-center justify-between border-b border-[#252B34]">
        <div class="flex items-center">
            <a href="/" class="text-2xl font-['Pacifico'] text-white mr-8">GameHaven</a>
            <nav class="hidden md:flex space-x-6">
                <a href="/" class="text-gray-400 hover:text-white">Store</a>
                <a href="#" class="text-gray-400 hover:text-white">Library</a>
                <a href="#" class="text-gray-400 hover:text-white">Community</a>
                <a href="/forum" class="text-primary border-b-2 border-primary">Forum</a>
            </nav>
        </div>
        <div class="w-8 h-8 flex items-center justify-center rounded-full bg-[#252B34] text-white">
            <i class="ri-user-line"></i>
        </div>
    </header>

    <main class="max-w-4xl mx-auto py-8 px-4">
        <div class="flex items-center mb-6">
            <a href="/forum" class="text-gray-400 hover:text-white flex items-center">
                <i class="ri-arrow-left-line mr-2"></i>
                Back to Forum
            </a>
        </div>

        <div class="bg-[#1F252E] rounded-lg p-6 mb-8">
            <h1 class="text-2xl font-bold mb-6">Create New Thread</h1>
            <form action="{{route('thread.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label for="game" class="block text-gray-300 mb-2">Select Game</label>
                    <select id="game" name="game"
                        class="w-full bg-[#252B34] border border-[#3A4049] rounded px-4 py-3 text-white rounded-button">
                        <option value="">Select a game...</option>
                        @foreach ($games as $game)
                            <option value="{{ $game->id }}">{{ $game->gameTitle }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="category" class="block text-gray-300 mb-2">Select Category</label>
                    <select id="category" name="category"
                        class="w-full bg-[#252B34] border border-[#3A4049] rounded px-4 py-3 text-white rounded-button">
                        <option value="Game Discussion">Game Discussion</option>
                        <option value="Technical Support">Technical Support</option>
                        <option value="Community Creations">Community Creations</option>
                        <option value="General Discussion">General Discussion</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="threadTitle" class="block text-gray-300 mb-2">Thread Title</label>
                    <input type="text" id="threadTitle" name="title"
                        class="w-full bg-[#252B34] border border-[#3A4049] rounded px-4 py-3 text-white rounded-button"
                        placeholder="Enter thread title" required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-300 mb-2">Content</label>
                    <textarea id="threadContent" name="content"
                        class="w-full bg-[#252B34] border border-[#3A4049] rounded-b px-4 py-3 text-white min-h-[200px]"
                        placeholder="Share your thoughts, questions, or experiences..." required></textarea>
                </div>

                <div class="mb-6">
                    <label for="thread_type" class="block text-gray-300 mb-2">Thread Type</label>
                    <select id="thread_type" name="Type"
                        class="w-full bg-[#252B34] border border-[#3A4049] rounded px-4 py-3 text-white rounded-button">
                        <option value="guide">Guide</option>
                        <option value="bug">Bug Report</option>
                        <option value="discussion">Discussion</option>
                        <option value="question">Question</option>
                        <option value="news">News</option>
                        <option value="tips">Tips & Tricks</option>
                        <option value="mod">Mod</option>
                        <option value="review">Review</option>
                        <option value="suggestion">Suggestion</option>
                    </select>
                </div>

                <div class="mb-8">
                    <label class="block text-gray-300 mb-2">Attachments</label>
                    <div class="bg-[#252B34] border border-[#3A4049] rounded-lg p-4">
                        <input type="file" id="attachments" name="attachments[]"
                            class="block w-full text-white file:mr-4 file:py-2 file:px-4 
                            file:rounded file:border-0 file:text-white file:bg-purple-600 
                            file:hover:bg-purple-500 cursor-pointer"
                            multiple>
                        <p class="text-xs text-gray-400 mt-2">
                            Supported formats: JPG, PNG, GIF, MP4 (max 20MB)
                        </p>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex space-x-4">
                        <a href="/forum"
                            class="text-gray-400 hover:text-white py-3 px-6 rounded-button whitespace-nowrap">
                            Cancel
                        </a>
                        <button type="submit"
                            class="bg-purple-600 hover:bg-purple-500 cursor-pointer hover:bg-primary/90 px-6 py-3 rounded rounded-button whitespace-nowrap">
                            Create Thread
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <footer class="bg-[#131820] py-8 px-6 border-t border-[#252B34]">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between mb-8">
                <div class="mb-6 md:mb-0">
                    <a href="/" class="text-2xl font-['Pacifico'] text-white mb-4 block">GameHaven</a>
                    <p class="text-gray-400 max-w-xs">
                        Your ultimate destination for digital entertainment and gaming experiences.
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-white font-bold mb-4">Support</h3>
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
                        <h3 class="text-white font-bold mb-4">Legal</h3>
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

                    <div>
                        <h3 class="text-white font-bold mb-4">Follow Us</h3>
                        <p class="text-gray-400 mb-4">
                            Stay connected with the latest gaming news and community events.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#"
                                class="w-8 h-8 flex items-center justify-center bg-[#252B34] rounded-full text-white hover:bg-primary">
                                <i class="ri-twitter-x-line"></i>
                            </a>
                            <a href="#"
                                class="w-8 h-8 flex items-center justify-center bg-[#252B34] rounded-full text-white hover:bg-primary">
                                <i class="ri-discord-line"></i>
                            </a>
                            <a href="#"
                                class="w-8 h-8 flex items-center justify-center bg-[#252B34] rounded-full text-white hover:bg-primary">
                                <i class="ri-instagram-line"></i>
                            </a>
                            <a href="#"
                                class="w-8 h-8 flex items-center justify-center bg-[#252B34] rounded-full text-white hover:bg-primary">
                                <i class="ri-youtube-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-[#252B34] text-center text-gray-400 text-sm">
                <p>© 2024 GameHaven. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>
