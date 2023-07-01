<x-app-layout>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text" style="font-weight: bold; font-size: 24px;">Edit Post</h1>

        <form method="POST" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('patch')

            <div class="mt-5 mb-5">
                <label for="category" class="block">Category:</label>
                <input
                    type="text"
                    id="category"
                    name="category"
                    class="border border-gray-300 rounded-md py-1 px-3"
                    value="{{ $post->category }}"
                    disabled
                >
            </div>            
            
            <div class="mt-5 mb-5">
                <label for="category" class="block">Title:</label>
                <input
                    type="text"
                    name="title"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('title', $post->title) }}"
                >
            </div>

            <div class="mt-5 mb-5">
                <label for="category" class="block">Description:</label>
                <textarea 
                    name="description"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    rows="7"
                    >{{old('description', $post->description)}} 
                </textarea>
                <div class="mt-4 space-x-2">
                    <x-primary-button type="submit">{{ __('Save') }}</x-primary-button>
                    <a href="{{ route('posts.index') }}">{{ __('Cancel') }}</a>
                </div>
            </div>

        </form>

    </div>

</x-app-layout>
