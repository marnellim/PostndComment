<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center">
                    <div class="card-deck">
                        <div class="card">
                            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top" alt="Fissure in Sandstone"/>
                            <div class="card-body">
                                <h5 class="category">Current Events</h5>
                                <x-primary-button>{{ __('View Post/Comments') }}</x-primary-button> 
                            </div>
                        </div>

                        <div class="card">
                            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top" alt="Fissure in Sandstone"/>
                            <div class="card-body">
                                <h5 class="category">How-To-Guides</h5>
                                <x-primary-button>{{ __('View Post/Comments') }}</x-primary-button> 
                            </div>
                        </div>

                        <div class="card">
                            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top" alt="Fissure in Sandstone"/>
                            <div class="card-body">
                                <h5 class="category">Product Reviews</h5>
                                <x-primary-button>{{ __('View Post/Comments') }}</x-primary-button> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-justify">
                    <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                        <form method="GET" action="{{ route('posts.index') }}">
                            <div class="flex items-center justify-end mb-4">
                                {{-- category filter--}}
                                <label for="category" class="mr-2">Filter by category:</label>
                                <select id="category" name="category" class="border border-gray-300 rounded-md py-1 px-2">
                                    <option value="">All</option>
                                    <option value="Current Events" {{ $selectedCategory === 'Current Events' ? 'selected' : '' }}>Current Events</option>
                                    <option value="How To Guides" {{ $selectedCategory === 'How To Guides' ? 'selected' : '' }}>How-To Guides</option>
                                    <option value="Product Reviews" {{ $selectedCategory === 'Product Reviews' ? 'selected' : '' }}>Product Reviews</option>
                                </select>
                                <x-primary-button type="submit" name="filter" value="category" class="ml-5" >Search</x-primary-button>
                                {{-- view all my post filter--}}
                                <label for="my-posts" class="ml-4">View all my posts:</label>
                                <input type="checkbox" id="my-posts" name="my_posts" value="1" onclick="this.form.submit()" {{ request()->has('my_posts') ? 'checked' : '' }}>
                            </div>
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
                                                <div class="like-comment-container">
                                                    <form>
                                                        <button type="submit" onclick="window.location.href = '{{ route('comments.index', ['postId' => $post->id]) }}'" class="comment-link ml-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                                                <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                                                            </svg>
                                                            <p class="like-text" style="display: none">{{ __('Like')}}</p>
                                                        </button>
                                                    </form>                                                
                                                    <form >
                                                        <button type="submit" onclick="window.location.href = '{{ route('comments.index', ['postId' => $post->id]) }}'" class="comment-link ml-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                                                                <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                                                            </svg>  
                                                            <p class="comment-text" style="display: none">{{ __('Comment')}}</p>
                                                        </button>  
                                                    </form>
                                                    <form method="GET" action="{{ route('posts.edit', $post) }}" class="inline">
                                                        @csrf
                                                        <button type="submit" class="edit-comment ml-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                            </svg>
                                                            <p class="edit-comment" style="display: none">{{ __('Edit') }}</p>
                                                        </button>
                                                    </form>
                                                    <form method="POST" action="{{ route('posts.destroy', $post)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link p-0 ml-3" onclick="event.preventDefault(); this.closest('form').submit();">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                            </svg>
                                                        </button>
                                                    </form>
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


