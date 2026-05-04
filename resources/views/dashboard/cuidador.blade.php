<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi cuenta</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<!-- HEADER -->
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

<!-- CONTENIDO -->
<section class="dashboard">
    <h1>Reservas recibidas</h1>

    <div class="lista-reservas">

        @forelse($reservas as $reserva)

            <div class="reserva-card">

                <div class="reserva-info">
                    <strong>
                        {{ $reserva->fecha_inicio }} → {{ $reserva->fecha_fin }}
                    </strong>

                    <span class="estado {{ $reserva->estado }}">
                        {{ ucfirst($reserva->estado) }}
                    </span>
                </div>

                @if($reserva->estado === 'Pendiente')
                    <div class="acciones">

                        <!-- ACEPTAR -->
                        <form method="POST" action="{{ route('reservas.aceptar', $reserva->id_reserva) }}">
                            @csrf
                            <button class="btn-aceptar">Aceptar</button>
                        </form>

                        <!-- RECHAZAR -->
                        <form method="POST" action="{{ route('reservas.rechazar', $reserva->id_reserva) }}">
                            @csrf
                            <button class="btn-rechazar">Rechazar</button>
                        </form>

                    </div>
                @endif

            </div>

        @empty
            <p>No tienes solicitudes</p>
        @endforelse

    </div>
</section>

<footer>
    <p>© 2026 AppWau</p>
</footer>

</body>
</html>