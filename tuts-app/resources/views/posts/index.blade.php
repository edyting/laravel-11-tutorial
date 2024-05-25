{{-- @extends('layout')

@section('main')
    <h1>hello there</h1>
@endsection --}}

<x-layout>
{{-- 
    @auth
        <h1>Logged IN</h1>
    @endauth

    @guest
        <h1>Guest</h1>   
    @endguest --}}

    <h1 class="text-3xl font-bold capitalize">Latest posts</h1>
    {{-- {{$posts}}--}}

   <div class="grid grid-cols-2 gap-6">
    @foreach ($posts as $post)
    <div class="bg-white rounded-lg p-6 mb-4">
        {{-- title --}}
        <h2 class="font-bold text-2xl">{{$post->title}}</h2>
        {{-- author and date --}}
        <div class="mb-2">
            <span>Posted {{$post->created_at->diffForHumans()}} by</span>
            <a href="" class="text-blue-500 font-medium">username</a>
        </div>
    
        {{-- body --}}
        <div class="">
            <p>{{Str::words($post->body,15)}}</p>
            
        </div>
    </div>
@endforeach
   </div>


   {{-- pagination --}}
   <div class="">
    {{$posts->links()}}
   </div>


</x-layout>