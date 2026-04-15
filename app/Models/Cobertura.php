<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobertura extends Model
{
    use HasFactory;

    protected $table = 'coberturas';

    protected $fillable = [
        'poliza_id',
        'nombre',
        'descripcion',
        'limite',
    ];

    public function poliza()
    {
        return $this->belongsTo(PolizaSalud::class, 'poliza_id');
    }
}