<x-app-layout>
    <div class="py-12">
        <x-card-deck />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-justify">
                    <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                        <form method="GET" action="{{ route('posts.index') }}">
                            <div class="flex items-center justify-end mb-4">
                                {{-- category filter--}}
                                <label for="category" class="mr-2">Filter by category:</label>
                                <select id="category" name="category" class="border border-gray-300 rounded-md py-1 px-7">
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
                                                <x-post-description :post="$post" />                                                         
                                                <x-read-more />
                                                <x-read-less />
                                                <br><br>
                                                <x-comment-edit-delete-container :post="$post" />
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


