<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListaDeObjeto;

class ReportarController extends Controller
{
    public function store(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'ubicacion' => 'required|string',
            'tipo' => 'required|in:perdido,encontrado',
        ]);

        // Creación del objeto y guardado en la base de datos
        ListaDeObjeto::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'ubicacion' => $request->ubicacion,
            'tipo' => $request->tipo,
        ]);

        return redirect()->route('reportar')->with('success', 'Objeto reportado exitosamente');
    }
}
