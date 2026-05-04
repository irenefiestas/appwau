<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuidador extends Model
{
    protected $table = 'cuidador';

    protected $primaryKey = 'id_cuidador';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'biografia',
        'ciudad',
        'precio_hora',
        'paseo',
        'guarderia',
        'cuidado_domicilio',
        'ranking_promedio',
        'verificado',
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_servicio');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
