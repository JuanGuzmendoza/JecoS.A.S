<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fechasentrega extends Model
{
    use HasFactory;
    protected $table = 'FechasEntrega';
    protected $fillable = ['cliente'];
}
