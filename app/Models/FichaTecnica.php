<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaTecnica extends Model
{
    use HasFactory;

    protected $table = 'ficha_tecnicas';

    protected $fillable = [
        'uid',
        'qrConden',
        'tipoConden',
        'voltaje',
        'phases',
        'tipoRefri',
        'btu',
        'tipoCompresor',
        'marcaCompresor',
        'ampCompresor',
        'placaCompresor',
        'tipoVentilador',
        'etiqVentilador',
        'compreCorriente',
        'qrEvaporador',
        'fotoEvaporador',
        'oficina',
        'piso',
        'agencia',
        'estado',

    ];
}
