<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
    protected $fillable = ['titulo', 'descripcion', 'ubicacion', 'tipo'];
}
