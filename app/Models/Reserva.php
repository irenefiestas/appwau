<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Servicio;
use App\Models\Resena;

class Reserva extends Model
{
    protected $table = 'reserva';

    protected $primaryKey = 'id_reserva';

    public $timestamps = false;

    protected $fillable = [
        'id_cliente',
        'id_servicio',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'total_pago'
    ];

    public function cliente()
    {
        return $this->belongsTo(User::class, 'id_cliente');
    }

    public function cuidador()
    {
        return $this->belongsTo(Cuidador::class, 'id_servicio');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio', 'id_servicio');
    }

    public function resena()
    {
        return $this->hasOne(Resena::class, 'id_reserva', 'id_reserva');
    }
}