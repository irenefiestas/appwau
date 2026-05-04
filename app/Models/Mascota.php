<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    protected $table = 'mascota';
    protected $primaryKey = 'id_mascota';

    protected $fillable = [
        'user_id',
        'nombre',
        'especie',
        'raza',
        'tamano'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}