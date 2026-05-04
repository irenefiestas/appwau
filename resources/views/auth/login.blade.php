@extends('layouts.auth')

@section('content')

<div class="auth-box">

    <div class="auth-logo">
        <img src="{{ asset('img/logo2.png') }}">
        <h2>AppWau</h2>
    </div>

    <h3>Iniciar sesión</h3>

    @if ($errors->any())
        <div class="errores">
            @foreach ($errors->all() as $error)
                <p>⚠ {{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <input type="email" name="email" placeholder="Email">
        @error('email')
            <span class="error">{{ $message }}</span>
        @enderror

        <input type="password" name="password" placeholder="Contraseña" >
        @error('password')
            <span class="error">{{ $message }}</span>
        @enderror

        <button type="submit" class="btn-principal">Entrar</button>
    </form>

    <p>¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a></p>

</div>

@endsection