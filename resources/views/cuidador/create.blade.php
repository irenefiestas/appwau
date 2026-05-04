<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hazte cuidador</title>

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
        <a href="#cuidadores">Cuidadores</a>
        <a href="/#servicios">Servicios</a>
        <a href="/#resenas">Reseñas</a>
    </nav>

    <div class="auth">
        @auth
            <!-- Nombre del usuario -->
            <span style="color:white; font-weight:bold; margin-right:10px;">
                {{ Auth::user()->name }}
            </span>

            <!-- Botón salir -->
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn">Salir</button>
            </form>
        @endauth
    </div>
</header>

<section class="form-container">

    <div class="form-card">

        <h2>Conviértete en cuidador</h2>

        @if ($errors->any())
            <div class="errores">
                @foreach ($errors->all() as $error)
                    <p>⚠ {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="/convertirse-cuidador">
            @csrf

            <label>Cuéntanos sobre ti</label>
            <textarea name="biografia">{{ old('biografia') }}</textarea>

            <div class="form-grid">
                <div>
                    <label>Ciudad</label>
                    <input type="text" name="ciudad" value="{{ old('ciudad') }}">
                </div>

                <div>
                    <label>Precio €/hora</label>
                    <input type="number" step="0.01" name="precio_hora" value="{{ old('precio_hora') }}">
                </div>
            </div>

            <label>Servicios</label>

            <div class="servicios-opciones">
                <label class="servicio">
                    <input type="checkbox" name="paseo">
                    <span> Paseos</span>
                </label>

                <label class="servicio">
                    <input type="checkbox" name="guarderia">
                    <span> Guardería</span>
                </label>

                <label class="servicio">
                    <input type="checkbox" name="cuidado_domicilio">
                    <span> Domicilio</span>
                </label>
            </div>

            <button type="submit" class="btn-submit">
                Convertirme en cuidador
            </button>

        </form>

    </div>

</section>

</body>
</html>