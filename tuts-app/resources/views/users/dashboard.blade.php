<x-layout>

    <h1 class="text-3xl font-bold">Welcome {{auth()->user()->name}}</h1>

    {{-- create a post --}}
    <div class="mb-4 mt-4">
        <h2 class="font-bold mb-4 capitalize ">Create a new post</h2>

        {{-- session messages --}}
        @if (session('success'))
        <div class="">
            <p>{{session('success')}}</p>
        </div>
        @endif
        

        <div class="bg-white p-4 rounded-lg">
            <form action="{{route('posts.store')}}" method="POST">
                @csrf
                {{-- Post title --}}
                <div class="flex  flex-col">
                    <label for="title" class="text-xl capitalize"> Post title</label>
                    <input value="{{old('name')}}" class="border-2  py-2 rounded-lg @error('body') ring-1 ring-red-500 @enderror my-[3px]" type="text" name="title">
                    @error('title')
                           <p class="text-sm text-red-300"> {{$message}} !</p>
                        @enderror
                </div>
    
                {{-- body --}}
                
                <div class="flex flex-col">
                    <label for="body" class="text-xl capitalize">post content</label>
    
                    <textarea name="body" 
                    class="border-2 @error('body') ring-1 ring-red-500 @enderror py-2 rounded-lg my-[3px]" rows="10"> {{old('body')}}</textarea>
    
                   
                    @error('body')
                           <p class="text-sm text-red-300"> {{$message}} !</p>
                        @enderror
                </div>
                
                 {{-- submit button --}}
             <button class="bg-blue-900 w-full my-4 py-2 rounded-lg text-white">Create</button>
            </form>
        </div>
    </div>

</x-layout>