<h1>Mis reservas</h1>

@foreach ($reservas as $reserva)
    <div class="card">
        <p>Cuidador ID: {{ $reserva->id_servicio }}</p>
        <p>Inicio: {{ $reserva->fecha_inicio }}</p>
        <p>Fin: {{ $reserva->fecha_fin }}</p>
        <p>Estado: {{ $reserva->estado }}</p>
    </div>
@endforeach