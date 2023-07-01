<form method="GET" action="{{ route('posts.edit', $post) }}" class="inline">
    @csrf
    <x-edit-button />
</form>