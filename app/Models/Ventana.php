<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventana extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'nombre',
        'costo_unitario',
    ];
}
