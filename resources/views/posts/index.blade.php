@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @auth
                <form action="{{ route('posts') }}" method="post" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something!"></textarea>

                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
                    </div>
                </form>
            @endauth

            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="mb-4">
                        <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                    
                        <p class="mb-2">{{ $post->body }}</p>
                    
                        <div class="flex items-center">
                            @auth
                                    <form action="" method="post" class="mr-1">
                                        @csrf
                                        <button type="submit" class="text-blue-500">Vote</button>
                                    </form>
                                    <form action="" method="post" class="mr-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-blue-500">Unvote</button>
                                    </form> 

                                    <span>{{ $post->likes->count() }} {{ Str::plural('Vote', $post->likes->count()) }}</span>
                            @endauth
                        
                        </div>
                    </div>
                @endforeach
                {{-- {{ $posts->links() }} --}}
            @else
                <p>There are no posts</p>
            @endif
        </div>
    </div>
@endsection