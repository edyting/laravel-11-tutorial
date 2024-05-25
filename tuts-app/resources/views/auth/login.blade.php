<x-layout>
    <div class="w-full">
        <h2 class="text-4xl font-bold text-start mb-4">Welcome Back</h2>

    {{-- form --}}
    <div class="bg-white p-4 w-[ shadow-lg rounded-lg mx-auto">
        <form action="{{route('login')}}" method="POST">
            {{-- add csrf --}}
            @csrf

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


            {{-- remember me --}}
            <div class="my-2">
                <input type="checkbox" name="remember" id="remember" >
                <label for="remember">Remember me</label>
            </div>
            
            @error('failed')
                       <p class="text-sm text-red-300"> {{$message}} !</p>
                    @enderror

             {{-- submit button --}}
             <button class="bg-blue-900 w-full my-4 py-2 rounded-lg text-white">Login</button>
        </form>
    </div>
    </div>
</x-layout>