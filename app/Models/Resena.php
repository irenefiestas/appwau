<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resena extends Model
{
    protected $table = 'resena';

    protected $primaryKey = 'id_resena';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'puntuacion',
        'comentario',
        'fecha_publicacion'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}