<x-app-layout>
    @if ($selectedCategory === 'Current Events')
        <x-currentevents :selectedCategory="$selectedCategory ?? ''" />
    @elseif ($selectedCategory === 'How To Guides')
        <x-howtoguides :selectedCategory="$selectedCategory ?? ''" />
    @elseif ($selectedCategory === 'Product Reviews')
        <x-productreviews :selectedCategory="$selectedCategory ?? ''"  />
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-justify">
                    <div class="mt-4 bg-white shadow-sm rounded-lg divide-y">
                        <div class="mb-4" style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="grid-form">
                                <x-create-post />
                            </div>
                            <form method="GET" action="{{ route('comments.index') }}">
                                    <div class="grid-form" style="display: flex; justify-content: space-between; align-items: center;">
                                        <label type="hidden" for="category" class="mr-4">Category</label>
                                        <select type="hidden"  id="category" name="category" class="border border-gray-300 rounded-md py-1 px-7">
                                            <option value="">All</option>
                                            <option value="Current Events" {{ $selectedCategory === 'Current Events' ? 'selected' : '' }}>Current Events</option>
                                            <option value="How To Guides" {{ $selectedCategory === 'How To Guides' ? 'selected' : '' }}>How to Guides</option>
                                            <option value="Product Reviews" {{ $selectedCategory === 'Product Reviews' ? 'selected' : '' }}>Product Reviews</option>
                                        </select>   
                                        <x-primary-button type="hidden" name="filter" value="category" class="ml-5"></x-primary-button>
                                        <label for="my-posts" class="ml-4 mr-2">View all my posts:</label>
                                        <input type="checkbox" id="my-posts" name="my_posts" value="1" onclick="this.form.submit()" {{ request()->has('my_posts') ? 'checked' : '' }}>
                                    </div>
                                </form>
                            </div> 
                        </div> 
                        
                        @foreach ($posts as $post)
                            @if (request()->has('my_posts') && $post->user_id === auth()->user()->id && (!$selectedCategory || $post->category === $selectedCategory))
                                <div class="p-6 flex space-x-2 bg-gray-100 hover:bg-gray-200 mb-4" data-user-id="{{ $post->user->id ?? '' }}" data-category="{{ $post->category ?? '' }}">
                                    <x-post-content :post="$post" />
                                </div>
                            @elseif (!request()->has('my_posts') && (!$selectedCategory || $post->category === $selectedCategory))
                                <div class="p-6 flex space-x-2 bg-gray-100 hover:bg-gray-200 mb-4" data-user-id="{{ $post->user->id ?? '' }}" data-category="{{ $post->category ?? '' }}">
                                    <x-post-content :post="$post" />
                                </div>
                            @endif                            
                        @endforeach
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
