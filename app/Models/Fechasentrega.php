<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fechasentrega extends Model
{
    use HasFactory;
    protected $table = 'FechasEntrega';
    protected $fillable = [
        'cliente',
        'entrega',
        'oc',
        'codigo',
        'nombre',
        'cant',
        'cost_unit',
        'cost_total',
        'c_tela',
        'cost',
        'c_mad',
        'arm',
        'emparr',
        'c_esp',
        'p_blan',
        'tapic',
        'ensam',
        'despa',
        'nieves',
        'mes',
        'año',
        'estado'
    ];
}
