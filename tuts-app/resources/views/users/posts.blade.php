<x-layout>
    
    <h2 class="font-semibold text-3xl mb-2">{{$user->name}}'s Posts &#9830;  {{$posts->total()}}</h2>

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