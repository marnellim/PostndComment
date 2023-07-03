<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
            <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-justify">
                    <div class="mt-2 bg-gray-200 shadow-sm rounded-lg divide-y">
                        <h1 class="text" style="font-weight: bold; font-size: 24px;">Edit Post</h1>

                        <form method="POST" action="{{ route('posts.update', $post) }}">
                            @csrf
                            @method('patch')

                            <div class="mt-4 mb-2">
                                <label for="category" class="block">Category:</label>
                                <input
                                    type="text"
                                    id="category"
                                    name="category"
                                    class="border border-gray-300 rounded-md py-1 px-3 text-black"
                                    value="{{ $post->category }}"
                                    disabled
                                >
                            </div>            
                            
                            <div class="mt-4 mb-2>
                                <label for="category" class="block">Title:</label>
                                <input
                                    type="text"
                                    name="title"
                                    class="block w-full border-gray-300 text-black focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                    value="{{ old('title', $post->title) }}"
                                >
                            </div>

                            <div class="mt-4 mb-2">
                                <label for="category" class="block">Description:</label>
                                <textarea 
                                    name="description"
                                    class="block w-full border-gray-300 text-black focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                    rows="7"
                                    >{{old('description', $post->description)}} 
                                </textarea>
                                <div class="mt-4 space-x-2">
                                    <x-primary-button type="submit">{{ __('Save') }}</x-primary-button>
                                    <a href="{{ route('posts.index') }}" class="red-link">{{ __('Cancel') }}</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
