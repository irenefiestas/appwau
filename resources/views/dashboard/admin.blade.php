<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin</title>

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

    <h1>Panel de Administrador</h1>

    <div class="stats-admin">

        <div class="stat-card">
            <strong>Usuarios:</strong>
            <p>{{ $totalUsuarios }}</p>
        </div>

        <div class="stat-card">
            <strong>Mascotas:</strong>
            <p>{{ $totalMascotas }}</p>
        </div>

        <div class="stat-card">
            <strong>Reservas:</strong>
            <p>{{ $totalReservas }}</p>
        </div>

    </div>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif

    <div class="tabla-admin">

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acción</th>
                </tr>
            </thead>

            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->role }}</td>

                        <td>
                            @if($usuario->id !== auth()->id())
                                <form method="POST" action="{{ route('admin.usuarios.destroy', $usuario->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn-danger"
                                        onclick="return confirm('¿Eliminar usuario?')">
                                        Eliminar
                                    </button>
                                </form>
                            @else
                                <span>(Tú)</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</section>

<!-- FOOTER -->
<footer>
    <p>© 2026 AppWau</p>
</footer>

</body>
</html>