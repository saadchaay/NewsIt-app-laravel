@props(['comment' => $comment])

<div class="mb-4">
    <div class="flex justify-center">
        {{ $comment->body }} <span> {{ $comment->user_id }} </span>
    </div>
</div>