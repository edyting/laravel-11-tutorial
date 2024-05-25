<x-layout>
    <div class="w-full">
        <h2 class="text-4xl font-bold text-start mb-4">Register a new account</h2>

    {{-- form --}}
    <div class="bg-white p-4 w-[ shadow-lg rounded-lg mx-auto">
        <form action="{{route('register')}}" method="POST">
            {{-- add csrf --}}
            @csrf
            {{-- name --}}
                <div class="flex flex-col ">
                    <label for="name" class="text-xl capitalize">Name</label>
                    <input value="{{old('name')}}" class="border-2 py-2 @error('name') ring-1 ring-red-500 @enderror rounded-lg my-[3px]" type="text" name="name">
                    @error('name')
                       <p class="text-sm text-red-300"> {{$message}} !</p>
                    @enderror
                </div>

             {{-- email --}}
             <div class="flex flex-col">
                <label for="email" class="text-xl capitalize">email</label>
                <input value="{{old('name')}}" class="border-2 @error('email') ring-1 ring-red-500 @enderror py-2 rounded-lg my-[3px]" type="text" name="email">
                @error('email')
                       <p class="text-sm text-red-300"> {{$message}} !</p>
                    @enderror
            </div>

             {{-- password --}}
             <div class="flex flex-col">
                <label for="password" class="text-xl capitalize">password</label>
                <input class="border-2 py-2 @error('password') ring-1 ring-red-500 @enderror rounded-lg my-[3px]" type="password" name="password">
                @error('password')
                       <p class="text-sm text-red-300"> {{$message}} !</p>
                    @enderror
            </div>

             {{-- confirmation password --}}
             <div class="flex flex-col">
                <label for="password_confirmation" class="text-xl capitalize">Confirm password</label>
                <input class="border-2 @error('password') ring-1 ring-red-500 @enderror py-2 rounded-lg my-[3px]" type="password" name="password_confirmation">
            </div>

             {{-- submit button --}}
             <button class="bg-blue-900 w-full my-4 py-2 rounded-lg text-white">Register</button>
        </form>
    </div>
    </div>
</x-layout>