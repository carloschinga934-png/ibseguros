<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolizaSalud extends Model
{
    use HasFactory;

    protected $table = 'polizas_salud';

    protected $fillable = [
        'historial_medico_id',
        'numero_poliza',
        'tipo_seguro',
        'estado',
        'fecha_contratacion',
        'fecha_vencimiento',
        'prima_anual',
    ];

    protected $casts = [
        'fecha_contratacion' => 'date',
        'fecha_vencimiento' => 'date',
        'prima_anual' => 'decimal:2',
    ];

    public function historialMedico()
    {
        return $this->belongsTo(HistorialMedico::class);
    }

    public function coberturas()
    {
        return $this->hasMany(Cobertura::class, 'poliza_id');
    }

    public function atenciones()
    {
        return $this->hasMany(AtencionMedica::class, 'poliza_id');
    }
}