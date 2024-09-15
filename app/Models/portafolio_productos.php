<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class portafolio_productos extends Model
{
    use HasFactory;
    protected $table = 'portafolio_productos';
    protected $fillable = [
        'oc',
        'codigo',
        'nombre',
        'cost_unit',
    ];
}
