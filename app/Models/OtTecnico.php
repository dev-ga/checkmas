<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtTecnico extends Model
{
    use HasFactory;

    protected $table = 'ot_tecnicos';

    protected $fillable = [
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

}
