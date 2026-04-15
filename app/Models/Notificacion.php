<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    protected $table = 'notificaciones';

    protected $fillable = [
        'user_id',
        'tipo',
        'titulo',
        'contenido',
        'estado',
        'prioridad',
        'numero_referencia',
        'fecha_notificacion',
    ];

    protected $casts = [
        'fecha_notificacion' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}