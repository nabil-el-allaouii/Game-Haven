@extends('layouts.app')

@section('title', 'Create New Thread - Forum')

@section('styles')
    <style>
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
@endsection

@section('content')
    <main class="max-w-4xl mx-auto py-8 px-4">
        <div class="flex items-center mb-6">
            <a href="/forum" class="text-gray-400 hover:text-white flex items-center">
                <i class="ri-arrow-left-line mr-2"></i>
                Back to Forum
            </a>
        </div>

        <div class="bg-[#1F252E] rounded-lg p-6 mb-8">
            <h1 class="text-2xl font-bold mb-6">Create New Thread</h1>
            <form action="{{ route('thread.store') }}" method="POST" enctype="multipart/form-data">
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
                        <option value="Guide">Guide</option>
                        <option value="Bug">Bug Report</option>
                        <option value="Discussion">Discussion</option>
                        <option value="Question">Question</option>
                        <option value="News">News</option>
                        <option value="Tips & Tricks">Tips & Tricks</option>
                        <option value="Mod">Mod</option>
                        <option value="Review">Review</option>
                        <option value="Suggestion">Suggestion</option>
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
                        <a href="/forum" class="text-gray-400 hover:text-white py-3 px-6 rounded-button whitespace-nowrap">
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
@endsection
