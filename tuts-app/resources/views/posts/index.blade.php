{{-- @extends('layout')

@section('main')
    <h1>hello there</h1>
@endsection --}}

<x-layout>

    @auth
        <h1>Logged IN</h1>
    @endauth

    @guest
        <h1>Guest</h1>   
    @endguest

</x-layout>