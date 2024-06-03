<x-layout>
    <a href="{{route('dashboard')}}" class="block mb-2 text-xs text-blue-500">&larr; Go back to your dashboard</a>
    <div class="bg-white p-4 rounded-lg">
        <h2 class="mb-2 font-semibold capitalize text-xl">Update your post</h2>
        <form action="{{route('posts.update',$post)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- Post title --}}
            <div class="flex  flex-col">
                <label for="title" class="text-xl capitalize"> Post title</label>
                <input value="{{$post->title}}" class="border-2  py-2 rounded-lg @error('body') ring-1 ring-red-500 @enderror my-[3px]" type="text" name="title">
                @error('title')
                       <p class="text-sm text-red-300"> {{$message}} !</p>
                    @enderror
            </div>

            {{-- body --}}
            
            <div class="flex flex-col">
                <label for="body" class="text-xl capitalize">post content</label>

                <textarea name="body" 
                class="border-2 @error('body') ring-1 ring-red-500 @enderror py-2 rounded-lg my-[3px]" rows="10"> {{$post->body}}</textarea>

               
                @error('body')
                       <p class="text-sm text-red-300"> {{$message}} !</p>
                    @enderror
            </div>

            {{-- current cover photo if it exists --}}

    <div >
        <label for="body" class="text-xl capitalize my-2"> current cover photo </label>
        @if ($post->image)
        <img class=" w-1/4 h-[15rem] object-cover rounded-md" src="{{asset('storage/' . $post->image)}}" alt="">
        @endif

        {{-- post image --}}
        <div class=" my-4">
            <label for="image">Upload cover photo</label>
            <input type="file" name="image" id="image">

            @error('image')
                   <p class="text-sm text-red-300"> {{$message}} !</p>
                @enderror
        </div>
    </div>
            
             {{-- submit button --}}
         <button class="bg-blue-900 w-full my-4 py-2 rounded-lg text-white">Update</button>
        </form>
    </div>
</div>

</x-layout>