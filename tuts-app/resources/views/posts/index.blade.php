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

   <div class="grid  grid-cols-2 gap-6">
    @foreach ($posts as $post)
    <x-postCard :post="$post"/>
@endforeach
   </div>


   {{-- pagination --}}
   <div class="">
    {{$posts->links()}}
   </div>


</x-layout>