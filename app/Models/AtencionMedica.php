<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtencionMedica extends Model
{
    use HasFactory;

    protected $table = 'atenciones_medicas';

    protected $fillable = [
        'poliza_id',
        'fecha',
        'tipo',
        'centro_medico',
        'diagnostico',
        'monto',
    ];

    protected $casts = [
        'fecha' => 'date',
        'monto' => 'decimal:2',
    ];

    public function poliza()
    {
        return $this->belongsTo(PolizaSalud::class, 'poliza_id');
    }
}