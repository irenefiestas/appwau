<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>AppWau</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        <a href="#servicios">Servicios</a>
        <a href="#resenas">Reseñas</a>
    </nav>

    <div class="auth">
        @auth
            <a class="btn" href="{{ url('/dashboard') }}">Mi cuenta</a>

            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn">Salir</button>
            </form>
        @else
            <a class="btn" href="{{ route('login') }}">Login</a>
            <a class="btn" href="{{ route('register') }}">Registro</a>
        @endauth
    </div>
</header>

<section class="hero" id="cuidadores">
    <div>
        <h1>Encuentra el mejor cuidador para tu mascota</h1>
        <p>Rápido, seguro y cerca de ti</p>
        <a href="{{ route('buscar') }}" class="btn-principal">
            Buscar cuidadores
        </a>

        @auth
            @if(Auth::user()->role === 'cliente')
                <a href="/convertirse-cuidador" class="btn">
                    Quiero ser cuidador
                </a>
            @endif
        @endauth

    </div>
</section>

<section class="servicios" id="servicios">
    <h2>Servicios para tu mascota</h2>
    <p class="subtitulo">Elige el cuidado que mejor se adapte a ti</p>

    <div class="servicios-grid">

        <div class="servicio-card">
            <img src="{{ asset('img/paseo.jpg') }}">
            <div class="contenido">
                <h3>Paseo de perros</h3>
                <p>Salidas diarias con seguimiento, fotos y rutas en tiempo real.</p>
            </div>
        </div>

        <div class="servicio-card">
            <img src="{{ asset('img/casa.jpg') }}">
            <div class="contenido">
                <h3>Cuidado en casa</h3>
                <p>El cuidador se queda en tu hogar manteniendo la rutina de tu mascota.</p>
            </div>
        </div>

        <div class="servicio-card">
            <img src="{{ asset('img/guarderia.jpg') }}">
            <div class="contenido">
                <h3>Guardería</h3>
                <p>Tu mascota juega y socializa en un entorno seguro durante el día.</p>
            </div>
        </div>

    </div>
</section>

<section class="resenas" id="resenas">
    <h2>Lo que dicen nuestros clientes</h2><br/>

    <div class="resenas-grid">
        @foreach($resenas as $resena)
            <div class="resena-card">

                <div class="resena-top">
                    <div class="avatar">
                        <img src="https://i.pravatar.cc/100?u={{ $resena->id_resena }}">
                    </div>

                    <div class="info">
                        <strong>{{ $resena->user->name ?? 'Usuario' }}</strong>

                        <div class="estrellas">
                            @for ($i = 1; $i <= 5; $i++)
                                @if($i <= $resena->puntuacion)
                                    ⭐
                                @else
                                    ☆
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>

                <p class="comentario">
                    "{{ $resena->comentario }}"
                </p>

            </div>
        @endforeach
    </div>
</section>

<section class="crear-resena">
    <h2>Dejar una reseña</h2>

    @auth
        @if(Auth::user()->role === 'cliente')

            <form method="POST" action="{{ route('resenas.store') }}" class="form-resena">
                @csrf

                <label>Puntuación</label>
                <select name="puntuacion" required>
                    <option value="">Selecciona</option>
                    <option value="5">⭐⭐⭐⭐⭐ Excelente</option>
                    <option value="4">⭐⭐⭐⭐ Muy bueno</option>
                    <option value="3">⭐⭐⭐ Normal</option>
                    <option value="2">⭐⭐ Mejorable</option>
                    <option value="1">⭐ Malo</option>
                </select>

                <label>Comentario</label>
                <textarea name="comentario" placeholder="Cuenta tu experiencia..." required></textarea>

                

                <button type="submit">Enviar reseña</button>
            </form>

        @elseif(Auth::user()->role === 'cuidador')
            <p>Los cuidadores no pueden dejar reseñas</p>
        @elseif(Auth::user()->role === 'admin')
            <p>Los administradores no pueden dejar reseñas</p>
        @endif
    @else
        <p>Debes iniciar sesión para dejar una reseña</p>
    @endauth

</section>

<footer>
    <p>© 2026 AppWau</p>
</footer>

</body>
</html>