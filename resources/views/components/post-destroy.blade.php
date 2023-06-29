<form method="POST" action="{{ route('posts.destroy', $post)}}">
    @csrf
    @method('DELETE')
    <x-delete-button />
</form>