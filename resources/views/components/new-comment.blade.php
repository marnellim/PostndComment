<div class="max-w-7xl mx-auto sm:px-5 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-8">
            <div class="flex-1">
                <form action="{{ route('comments.store', ['post_id' => $post->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user_id ?? null }}" />
                    <input type="hidden" name="post_id" value="{{ $post->id }}" />

                    <label>Add a New Comment:</label>
                    <textarea
                        name="comment"
                        id="commentInput"
                        placeholder="{{ __('What\'s on your mind?') }}"
                        rows=""
                        cols="65"
                        class="block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    ></textarea>
                    <div class="flex justify-end mt-4">
                        <x-primary-button type="submit">{{ __("Post Comment") }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
