<span class="summary-content pre-wrap" style="white-space: pre-wrap;">{{ Str::limit(e($post->description), $limit = 100, $end = '...') }}</span>
<span class="full-description" style="display: none;">
    {!! nl2br(e($post->description)) !!}
</span> 