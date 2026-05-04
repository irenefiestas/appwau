<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
</head>
<body>

<h1>Lista de usuarios</h1>

@foreach($usuarios as $usuario)
    <div>
        <p><strong>Nombre:</strong> {{ $usuario->nombre }}</p>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <p><strong>Teléfono:</strong> {{ $usuario->telefono }}</p>
        <hr>
    </div>
@endforeach

</body>
</html>