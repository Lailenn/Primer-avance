<?php

namespace App\Http\Controllers;

use App\Models\Objeto; // Importa el modelo Objeto
use Illuminate\Http\Request;

class ObjetoController extends Controller
{
    // Método para registrar un nuevo objeto
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'ubicacion' => 'required|string',
            'tipo' => 'required|string',
        ]);

        // Crear un nuevo objeto en la base de datos
        $objeto = Objeto::create([
            'titulo' => $validatedData['titulo'],
            'descripcion' => $validatedData['descripcion'],
            'ubicacion' => $validatedData['ubicacion'],
            'tipo' => $validatedData['tipo'],
        ]);

        // Responder con un mensaje de éxito
        return response()->json(['message' => 'Objeto registrado con éxito.']);
    }
}
