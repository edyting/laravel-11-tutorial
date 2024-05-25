<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{env('APP_NAME')}}</title>
    {{-- to use vite to refresh the server --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100">
   <header>
    <nav class="h-[5rem] flex items-center  justify-between px-12 bg-blue-900">
        <a href="{{route('home')}}" class="text-4xl font-bold text-white">Home</a>

        @auth
          <div class="relative grid place-items-center " x-data="{open:false}">
            {{-- dropdown btn--}}
            <button x-on:click="open = !open" type="button" class="w-10 h-10 ring-[3px] rounded-full bg-slate-400">
                <img src="" alt="">
            </button>

            {{-- dropdown menu --}}
            <div @click.outside="open = false" x-show="open" class="bg-white shadow-lg absolute top-12 right-0 rounded-lg overflow-hidden  font-light w-[10rem] text-left">
                {{-- show users name --}}
                <p class="p-2">{{auth()->user()->name}}</p>
                <a href="{{route('dashboard')}}" class=" hover:bg-slate-200 p-2 block">Dashboard</a>

                 {{-- logout --}}
                 <form action=" {{route('logout')}} " method="POST">
                    @csrf
                    <button class="block w-full p-2 hover:bg-slate-200 text-left">LOGOUT</button>
                </form>
            </div>
            </div>  
        @endauth
        
        @guest
        <div class="gap-[10px] flex">
            <a href="{{route('login')}}" class="text-2xl text-white capitalize">login</a>
            <a href="{{route('register')}}" class="text-2xl text-white capitalize">register</a>
        </div>   
        @endguest


    </nav>
   </header>

   <main class="py-8 px-4 mx-auto max-w-screen-lg">
    {{-- using yield --}}
    {{-- @yield('main') --}}
    {{$slot}}
   </main>
</body>
</html>


{{-- <div>
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
    <h2>I'm new here</h2>
</div> --}}

