@props(['post' => $post, 'comments' => $post->comments])

<div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

    <div class="mx-5 bg-white p-6 rounded-lg">
        <p class="mb-2">{{ $post->body }}</p>
    </div>

    @can('delete', $post)
    <div>
        <form action="{{ route('posts.destroy', $post) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Delete</button>
        </form>
    </div>
    @endcan
    
    <div class="flex items-center">
        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Vote</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE') 
                    <button type="submit" class="text-blue-500">Unvote</button>
                </form> 
            @endif
        @endauth
        <span>{{ $post->likes->count() }} {{ Str::plural('Vote', $post->likes->count()) }}</span>
    </div>
    <div class="">

    </div>
    @foreach ( $post->comments as $comment )
    <x-comment :comment="$comment" />
 @endforeach
</div>