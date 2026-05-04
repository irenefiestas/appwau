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
    <h1>Mis reservas</h1>

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

            </div>

        @empty
            <p>No tienes reservas</p>
        @endforelse

    </div>

    <br/><h2>Mis mascotas</h2>

    @if($mascotas->isEmpty())
        <br/><p>No tienes mascotas todavía </p>
    @else
        <div class="grid-mascotas">
            @foreach($mascotas as $mascota)
                <div class="mascota-card">

                    <div class="mascota-top">
                        <img src="{{ asset('img/default-pet.jpg') }}" alt="mascota">
                    </div>

                    <div class="mascota-info">
                        <h3>{{ $mascota->nombre }}</h3>

                        <p>{{ $mascota->especie }}</p>

                        @if($mascota->raza)
                            <p>{{ $mascota->raza }}</p>
                        @endif

                        @if($mascota->tamano)
                            <span>{{ $mascota->tamano }}</span>
                        @endif
                    </div>

                    <a href="{{ route('mascotas.edit', $mascota) }}" class="btn-ver">
                        Editar
                    </a><br/><br/>

                </div>
            @endforeach
        </div>
    @endif
    <div>
        <br/><a href="{{ route('mascotas.create') }}" class="btn-ver">
            Añadir mascota
        </a>
    </div>
</section>

<footer>
    <p>© 2026 AppWau</p>
</footer>

</body>
</html>