@extends('layouts.auth')

@section('content')

<div class="auth-box">

    <div class="auth-logo">
        <img src="{{ asset('img/logo2.png') }}" >
        <h2>AppWau</h2>
    </div>

    <h3>Crear cuenta</h3>

    @if ($errors->any())
        <div class="errores">
            @foreach ($errors->all() as $error)
                <p>⚠ {{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <input type="text" name="name" placeholder="Nombre" >
        @error('name')
            <small class="error-text">{{ $message }}</small>
        @enderror
        <input type="email" name="email" placeholder="Email" >
        @error('email')
            <small class="error-text">{{ $message }}</small>
        @enderror
        <input type="password" name="password" placeholder="Contraseña">
        @error('password')
            <small class="error-text">{{ $message }}</small>
        @enderror
        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" >

        <button type="submit" class="btn-principal">Registrarse</button>
    </form>

    <p>¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a></p>

</div>

@endsection