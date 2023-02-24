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
        'fechaInicio',
        'tecRespondable',
        'equipoUid',
        'tipoMantenimiento',
        'owner',
        'statusOts',
    ];

    public function otTecnico()
    {
        return $this->hasOne(OtTecnico::class);
    }
}
