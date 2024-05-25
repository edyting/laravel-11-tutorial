<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    {{-- to use vite to refresh the server --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100">
   <header>
    <nav class="h-[5rem] flex items-center  justify-between px-12 bg-blue-900">
        <a href="{{route('home')}}" class="text-4xl font-bold text-white">Home</a>
        
        <div class="gap-[10px] flex">
            <a href="" class="text-2xl text-white capitalize">login</a>
            <a href="{{route('register')}}" class="text-2xl text-white capitalize">register</a>
        </div>
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

