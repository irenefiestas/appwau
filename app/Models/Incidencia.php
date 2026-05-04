<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $table = 'incidencia';

    protected $primaryKey = 'id_incidencia';

    public $timestamps = false;

    protected $fillable = [
        'id_reserva',
        'tipo_excepcion',
        'descripcion',
        'estado_resolucion'
    ];
}
