<form method="GET" action="{{ route('comments.create', ['post_id' => request()->post_id]) }}">
    <div class="p-6 flex space-x-2 bg-gray-100 hover:bg-gray-200" data-user-id="{{ $post->user->id ?? '' }}" data-category="{{ $post->category ?? '' }}">
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
                <p class="text-sm text-gray-900">
                    <span class="summary-content pre-wrap" style="white-space: pre-wrap;">{{ Str::limit(e($post->description), $limit = 100, $end = '...') }}</span>
                    <span class="full-description" style="display: none;">
                        {!! nl2br(e($post->description)) !!}
                    </span>                                                                            
                    <a href="#" class="read-more-link" style="font-style: italic;">{{ __('Read more') }}</a>
                    <a href="#" class="read-less-link" style="font-style: italic; display: none;">{{ __('Read less') }}</a>
                    <br><br>              
                </p>
            </div>
        </div>
    </div>
</form>