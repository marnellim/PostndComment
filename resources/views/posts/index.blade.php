<x-app-layout>
    <div class="py-12">
        <x-card-deck />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-justify">
                    <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                        <form method="GET" action="{{ route('posts.index') }}">
                            <x-filter-post-category :selected-category="$selectedCategory" />
                        </form>
                        @foreach ($posts as $post)
                            @if (!$myPosts || $post->user->id === Auth::id())
                                <div class="p-6 flex space-x-2 bg-gray-100 hover:bg-gray-200 mb-4" data-user-id="{{ $post->user->id ?? '' }}" data-category="{{ $post->category ?? '' }}">
                                    <div class="h-6 w-6 flex items-center justify-center bg-gray-300 rounded-full text-gray-600">
                                        <span class="text-xs">{{ substr($post->user->name, 0, 1) }}</span>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-800">{{ $post->user->name }}</span>
                                            <small class="ml-2 text-sm text-gray-600">{{ $post->created_at->format('j M Y, g:i a') }}</small>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-900 " style="font-weight: bold;">{{ $post->title }}</p>
                                        <div class="description" data-full-description="{{ $post->description }}" data-short-description="{{ Str::limit($post->description, $limit = 100, $end = '...') }}">
                                            <p class="mt-2 text-sm text-gray-900">
                                                <span class="summary-content pre-wrap" style="white-space: pre-wrap;">{{ Str::limit(e($post->description), $limit = 100, $end = '...') }}</span>
                                                <span class="full-description" style="display: none;">
                                                    {!! nl2br(e($post->description)) !!}
                                                </span>
                                                                                    
                                                <a href="#" class="read-more-link" style="font-style: italic;">{{ __('Read more') }}</a>
                                                <a href="#" class="read-less-link" style="font-style: italic; display: none;">{{ __('Read less') }}</a>
                                                <br><br>
                                                <div class="comment-edit-delete-container">
                                                    <form action="{{ route('comments.create', ['post_id' => $post->id]) }}" method="GET" target="_blank">
                                                        @csrf
                                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                        <x-comment-button />
                                                    </form>
                                                    @auth
                                                    @if ($post->user_id == auth()->user()->id)
                                                    <form method="GET" action="{{ route('posts.edit', $post) }}" class="inline">
                                                        @csrf
                                                        <x-edit-button />
                                                    </form>
                                                    <form method="POST" action="{{ route('posts.destroy', $post)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-delete-button />
                                                    </form>
                                                    @endif
                                                    @endauth
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


