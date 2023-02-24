<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtTecnico extends Model
{
    use HasFactory;

    protected $table = 'ot_tecnicos';

    protected $fillable = [
        'ot_id',
        'otUid_id',
        'fechaEjecucion',
        'tipoMantenimiento',
        'limConden',
        'limEva',
        'lecAmpComp',
        'lecPreAlta',
        'lecPreBaja',
        'observacionesMp',
        'listaMateriales',
        'fotoAntes',
        'fotoDespues',
        'observacionesMc',

    ];

    public function ot()
    {
        return $this->belongsTo(Ot::class);
    }

    public function OtUid()
    {
        return $this->belongsTo(Ot::class, 'otUid');
    }
}
