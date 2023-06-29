<div class="comment-edit-delete-container">
    <x-post-comment :post="$post" />
    @auth
    @if ($post->user_id == auth()->user()->id)
    <x-post-edit :post="$post" />
    <x-post-destroy :post="$post" />
    @endif
    @endauth
</div>