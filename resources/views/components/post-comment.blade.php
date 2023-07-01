<form action="{{ route('comments.create', ['post_id' => $post->id]) }}" method="GET" target="_blank">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <x-comment-button />
</form>