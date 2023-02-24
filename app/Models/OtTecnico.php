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
        'fotoMpAntes1',
        'fotoMpAntes2',
        'fotoMpDesp1',
        'fotoMpDesp2',
        'fotoMcAntes1',
        'fotoMcAntes2',
        'fotoMcDesp1',
        'fotoMcDesp2',
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
