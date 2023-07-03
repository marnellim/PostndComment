<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
            <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-justify">
                    <div class="mt-2 bg-gray-200 shadow-sm rounded-lg divide-y">
                            <form method="POST" action="{{ route('posts.store') }}">
                                @csrf
                                <label for="category">Category</label>
                                <br>
                                <select     
                                    name="category" 
                                    id="category" 
                                    class="form-control mt-1 custom-spacing block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm "
                                    style="width: 200px;">
                                        <option value="Current Events">Current Events</option>
                                        <option value="How To Guides">How-To-Guides</option>
                                        <option value="Product Reviews">Product Reviews</option>
                                </select>
                                <br>
                                <label for="title" class="mt-3">Title</label>
                                <input 
                                    type="text" 
                                    name="title" 
                                    id="titleInput"
                                    placeholder=""
                                    class="form-control mt-1 custom-spacing block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm "
                                >
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                <br>
                                <label for="description" class="mt-3">Description</label>
                                <textarea
                                    name="description"
                                    id="descriptionInput"
                                    placeholder="{{ __('What\'s on your mind?') }}"
                                    rows="7"
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                >{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                <x-primary-button class="mt-4">{{ __('Create Post') }}</x-primary-button>
                                <a href="{{ route('posts.index') }}" class="red-link">{{ __('Cancel') }}</a>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
