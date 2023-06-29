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