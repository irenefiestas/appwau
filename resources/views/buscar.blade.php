<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
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

<!-- CONTENIDO -->
<section class="busqueda">
    <h1>Encuentra tu cuidador ideal</h1>

    <!-- GRID -->
    <div class="lista-cuidadores">
    @forelse ($cuidadores as $cuidador)
        <div class="cuidador-horizontal">

            <!-- IMAGEN -->
            <div class="cuidador-img">
                <img src="{{ asset('img/user.png') }}" alt="cuidador">
            </div>

            <!-- INFO -->
            <div class="cuidador-info">

                        <div class="top">
                            <h3>{{ $cuidador->user->name ?? 'Usuario' }}</h3>

                            <span class="rating">
                                ⭐ {{ $cuidador->ranking_promedio }}
                            </span>
                        </div>

                        <p class="bio">
                            {{ $cuidador->biografia }}
                        </p>

                        <!-- 📍 CIUDAD -->
                        <p>
                            📍 {{ $cuidador->ciudad ?? 'No especificada' }}
                        </p>

                        <!-- 💰 PRECIO -->
                        <p>
                            💰 {{ $cuidador->precio_hora ?? '0' }} €/h
                        </p>

                        <!-- 🐶 SERVICIOS -->
                        <p>
                            @if($cuidador->paseo) 🐕 Paseos @endif
                            @if($cuidador->guarderia) 🏠 Guardería @endif
                            @if($cuidador->cuidado_domicilio) 🛏️ Domicilio @endif
                        </p>

                        <div class="bottom">

                            @if($cuidador->verificado)
                                <span class="verificado">✔ Verificado</span>
                            @endif

                            <!-- BOTÓN RESERVA -->
                            @auth
                                @if(Auth::user()->role === 'cliente')

                                    <form method="POST" action="{{ route('reservas.store') }}" class="form-reserva">
                                        @csrf

                                        <input type="hidden" name="id_servicio" value="{{ $cuidador->id_cuidador }}">

                                        <input type="date" name="fecha_inicio" required>
                                        <input type="date" name="fecha_fin" required>

                                        <button type="submit" class="btn-ver">
                                            Reservar
                                        </button>
                                    </form>

                                @elseif(Auth::user()->role === 'cuidador')

                                    <span style="color:#888;">
                                        Función de reserva no disponible para cuidadores
                                    </span>

                                @elseif(Auth::user()->role === 'admin')

                                    <span style="color:#888;">
                                        Función de reserva no disponible para administradores
                                    </span>

                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn-ver">
                                    Inicia sesión para reservar
                                </a>
                            @endauth

                        </div>

                    </div>
                </div>

            @empty
                <p>No hay cuidadores disponibles</p>
            @endforelse
        </div>

    <!-- MAPA -->
    <div class="mapa">
        <iframe 
            src="https://www.google.com/maps?q=Sevilla&output=embed"
            width="100%" 
            height="250"
            style="border:0;">
        </iframe>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <p>© 2026 AppWau</p>
</footer>

</body>
</html>