<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListaDeObjeto extends Model
{
    protected $table = 'lista_de_objetos'; // Nombre de la tabla en la BD

    protected $fillable = ['titulo', 'descripcion', 'ubicacion', 'tipo']; // Campos que pueden ser llenados
}
