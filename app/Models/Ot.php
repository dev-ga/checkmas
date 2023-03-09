<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ot extends Model
{
    use HasFactory;

    protected $table = 'ots';

    protected $fillable = [
        'otUid',
        'tikect_id',
        'owner_tikect',
        'fechaInicio',
        'tecRes_NomApe',
        'tecRes_email',
        'equipoUid',
        'tipoMantenimiento',
        'costo_oper',
        'costo_preCli',
        'tir',
        'pdf_pre_oper',
        'pdf_pre_preCli',
        'owner',
        'statusOts',
        'statusOts_banco',
    ];


}
