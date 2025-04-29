@extends('layouts.app')

@section('title', 'Thread Title | Gaming Forum')

@section('styles')
    <style>
        .code-block {
            background-color: #1f2937;
            border-radius: 8px;
            font-family: 'Consolas', 'Monaco', monospace;
            overflow-x: auto;
        }

        .syntax-highlight .keyword {
            color: #93c5fd;
        }

        .syntax-highlight .string {
            color: #fca5a5;
        }

        .syntax-highlight .comment {
            color: #9ca3af;
        }

        .syntax-highlight .function {
            color: #c4b5fd;
        }

        .syntax-highlight .number {
            color: #fdba74;
        }
    </style>
@endsection

@section('content')
    <main class="container mx-auto px-4 py-6">
        <div class="max-w-4xl mx-auto">
            <div class="mb-6">
                <div class="flex items-center justify-between">
                    <h1 class="text-3xl font-bold text-white mb-3">{{ $thread->title }}</h1>
                    @can('delete-post', $thread)
                        <form action="{{ route('thread.destroy', $thread->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button
                                class="text-red-500 hover:text-white hover:bg-red-600 transition flex items-center cursor-pointer bg-red-500 rounded-full px-2 py-1 text-white">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </form>
                    @endcan
                </div>
                <div class="flex flex-wrap items-center gap-4 mb-4">
                    <div class="bg-[#312e81] text-xs font-medium px-2.5 py-1 rounded-full">
                        {{ $thread->category }}
                    </div>
                    <div class="text-gray-400 text-sm flex items-center">
                        <i class="ri-message-3-line mr-1.5"></i>
                        {{ $thread->replies->count() }} replies
                    </div>
                    <div class="text-gray-400 text-sm flex items-center">
                        <i class="ri-time-line mr-1.5"></i>
                        {{ $thread->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>

            <div class="bg-[#1e293b] rounded-lg mb-8 overflow-hidden">
                <div class="p-5">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <div
                                class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-500 to-blue-600 flex items-center justify-center text-white font-bold text-lg">
                                {{ substr($thread->user->name, 0, 1) }}
                            </div>
                        </div>
                        <div class="flex-grow">
                            <div class="flex items-center mb-2">
                                <span class="font-medium text-white mr-2">{{ $thread->user->name }}</span>
                            </div>
                            <div class="prose prose-invert max-w-none">
                                <p>{{ $thread->content }}</p>
                                @if ($thread->media)
                                    <div class="mt-4">
                                        <img src="{{ $thread->media }}" alt="Thread Image"
                                            class="rounded-lg w-full h-auto object-cover">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-[#1a2234] px-5 py-3 flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <button class="text-gray-400 hover:text-red-500 transition">
                            <i class="ri-flag-line mr-1.5"></i>
                            <span>Report</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-white">Replies ({{ $thread->replies->count() }})</h2>
                    <div class="flex items-center">
                        <span class="text-sm text-gray-400 mr-2">Sort by:</span>
                        <div class="relative">
                            <button class="bg-[#1e293b] text-gray-300 text-sm px-3 py-1.5 rounded-button flex items-center">
                                <span>Newest</span>
                                <i class="ri-arrow-down-s-line ml-1.5"></i>
                            </button>
                        </div>
                    </div>
                </div>

                @foreach ($thread->replies as $reply)
                    <div class="bg-[#1e293b] rounded-lg mb-4 overflow-hidden">
                        <div class="p-5">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-cyan-400 flex items-center justify-center text-white font-bold">
                                        {{ substr($reply->user->name, 0, 1) }}
                                    </div>
                                </div>
                                <div class="flex-grow">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center">
                                            <span class="font-medium text-white mr-2">{{ $reply->user->name }}</span>
                                            <span
                                                class="text-xs text-gray-400">{{ $reply->created_at->diffForHumans() }}</span>
                                        </div>
                                        @can('delete-reply', $reply)
                                            <form action="{{ route('reply.destroy', $reply->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                    class="!rounded-button bg-[#1e293b] hover:bg-[#2d3748] text-gray-300 px-3 py-1.5 text-sm transition flex items-center gap-1.5">
                                                    <i class="ri-delete-bin-line"></i>
                                                    <span>Delete</span>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                    <div class="prose prose-invert max-w-none">
                                        <p>{{ $reply->reply }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

            <div class="bg-[#1e293b] rounded-lg p-5">
                <h3 class="text-lg font-semibold text-white mb-4">Leave a Reply</h3>
                <form action="#" method="POST">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center text-white">
                                <i class="ri-user-line"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <form action="{{ route('reply.thread', $thread->id) }}" method="POST">
                                @csrf
                                <div class="bg-[#283548] rounded-lg mb-3">

                                    <textarea name="reply" class="w-full bg-transparent text-gray-200 p-4 min-h-[120px] focus:outline-none"
                                        placeholder="Share your thoughts..."></textarea>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="bg-purple-500 rounded-md hover:bg-purple-600 cursor-pointer text-white px-5 py-2 rounded-button transition whitespace-nowrap">
                                        Post Reply
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <div class="fixed bottom-6 right-6">
        <button
            class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white shadow-lg hover:bg-primary/90 transition">
            <i class="ri-arrow-up-line"></i>
        </button>
    </div>
@endsection

@section('scripts')

@endsection
