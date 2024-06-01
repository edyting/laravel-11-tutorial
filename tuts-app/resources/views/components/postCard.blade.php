@props(['post','full'=>false])

<div class="bg-white rounded-lg p-6 mb-4">
    {{-- title --}}
    <h2 class="font-bold text-2xl">{{$post->title}}</h2>
    {{-- author and date --}}
    <div class="mb-2">
        <span>Posted {{$post->created_at->diffForHumans()}} by</span>
        <a href="{{route('posts.user',$post->user)}}" class="text-blue-500 font-medium">{{$post->user->name}}</a>
    </div>

    {{-- body --}}
    @if ($full)
    <div class="">
        <span>{{$post->body}}</span>
    </div>
    @else
    <div class="">
        <span>{{Str::words($post->body,15)}}</span>
        <a href="{{route('posts.show',$post)}}" class="text-sm text-blue-500 font-semibold "> Read more &rarr;</a>
    </div>
    @endif

    <div class="flex items-center justify-end gap-4 mt-6">
        {{$slot}}
    </div>
</div>