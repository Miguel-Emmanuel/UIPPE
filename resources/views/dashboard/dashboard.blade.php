@extends('layout.navbar')
@section('content')
<title>Home</title>
<div class="container p-3">
    <h1 class="py-3">Home</h1>

    @auth
    <p>Bienvenido {{ auth()->user()->name ?? auth()->user()->username }}, estas autenticado a la página</p>
    @endauth

    @guest
    <p>Para ver el contenido <a href="/login">Inicia Sesión</a></p>
    @endguest

    @endsection
</div>