<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($mascota) ? 'Editar mascota' : 'Añadir mascota' }}</title>

    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<header>
    <div class="logo">
        <img src="{{ asset('img/logo2.png') }}" alt="Logo AppWau"/> AppWau
    </div>

    <nav>
        <a href="/">Inicio</a>
        <a href="/#cuidadores">Cuidadores</a>
        <a href="/#servicios">Servicios</a>
        <a href="/#resenas">Reseñas</a>
    </nav>

    <div class="auth">
        @auth
            <span style="color:white; font-weight:bold; margin-right:10px;">
                {{ Auth::user()->name }}
            </span>

            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn">Salir</button>
            </form>
        @endauth
    </div>
</header>

<section class="form-container">

    <div class="form-card">

        <h2>
            {{ isset($mascota) ? 'Editar mascota' : 'Nueva mascota' }}
        </h2>

        @if ($errors->any())
            <div class="errores">
                @foreach ($errors->all() as $error)
                    <p>⚠ {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST"
              action="{{ isset($mascota) ? route('mascotas.update', $mascota) : route('mascotas.store') }}">
            
            @csrf

            @if(isset($mascota))
                @method('PUT')
            @endif

            <label>Nombre</label>
            <input type="text" name="nombre"
                   value="{{ old('nombre', $mascota->nombre ?? '') }}">
            @error('nombre')
                <small class="error-text">{{ $message }}</small>
            @enderror

            <label>Especie</label><br/>
            <select name="especie">
                <option value="">Selecciona</option>
                <option value="Perro" {{ old('especie', $mascota->especie ?? '') == 'Perro' ? 'selected' : '' }}>Perro</option>
                <option value="Gato" {{ old('especie', $mascota->especie ?? '') == 'Gato' ? 'selected' : '' }}>Gato</option>
                <option value="Otro" {{ old('especie', $mascota->especie ?? '') == 'Otro' ? 'selected' : '' }}>Otro</option>
            </select><br/><br/>
            @error('especie')
                <small class="error-text">{{ $message }}</small>
            @enderror

            <label>Raza</label>
            <input type="text" name="raza"
                   value="{{ old('raza', $mascota->raza ?? '') }}">         

            <label>Tamaño</label><br/>
            <select name="tamano">
                <option value="">Selecciona</option>
                <option value="Pequeño" {{ old('tamano', $mascota->tamano ?? '') == 'Pequeño' ? 'selected' : '' }}>Pequeño</option>
                <option value="Mediano" {{ old('tamano', $mascota->tamano ?? '') == 'Mediano' ? 'selected' : '' }}>Mediano</option>
                <option value="Grande" {{ old('tamano', $mascota->tamano ?? '') == 'Grande' ? 'selected' : '' }}>Grande</option>
                <option value="Gigante" {{ old('tamano', $mascota->tamano ?? '') == 'Gigante' ? 'selected' : '' }}>Gigante</option>
            </select><br/><br/>

            <button type="submit" class="btn-submit">
                {{ isset($mascota) ? 'Actualizar mascota' : 'Guardar mascota' }}
            </button>

        </form>

    </div>

</section>

</body>
</html>