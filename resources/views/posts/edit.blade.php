<x-app-layout>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('patch')
            
            <input
            type="text"
            name="title"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            value="{{ old('title', $post->title) }}"
            >

            <textarea 
            name="description"
            class="block w-full border-gray-300 focus:border-indigo-300 mt-5 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            rows="7"
            >{{old('description', $post->description)}} </textarea>

            <div class="mt-4 space-x-2">
                <x-primary-button type="submit">{{ __('Save') }}</x-primary-button>
                <a href="{{ route('posts.index') }}">{{ __('Cancel') }}</a>
            </div>

        </form>

    </div>

</x-app-layout>
