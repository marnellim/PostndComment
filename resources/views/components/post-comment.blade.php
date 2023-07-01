<form action="{{ route('comments.create') }}" method="GET">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <x-comment-button />
</form>
