<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
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
            <label for="title" class="mt-5">Title</label>
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
            <x-primary-button class="mt-4">{{ __('Post') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
