<?php

namespace App\Http\Controllers;

use App\Models\Skin;
use Illuminate\Http\Request;

class SkinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recoger todos los registros de la tabla skins
        $skins = Skin::all();
        // Puedes pasar los datos a la vista o realizar cualquier otra lógica
        return view('verSkins', ['skins' => $skins]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos si es necesario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'imagen' => 'required|string', // Ajusta según tus necesidades
        ]);

        // Utilizando Eloquent para crear un nuevo Skin
        $skin = new Skin;
        $skin->nombre = $request->input('nombre');
        $skin->precio = $request->input('precio');
        $skin->imagen = $request->input('imagen');
        // Agrega más campos según tu base de datos

        $skin->save();

        return redirect()->route('skins')->with('success', 'Skin insertada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skin $skin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skin $skin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
         // Validación de datos si es necesario
    $request->validate([
        'id' => 'required|integer',
        'nombre' => 'required|string|max:255',
        'precio' => 'required|numeric',
        'imagen' => 'required|string', // Ajusta según tus necesidades
    ]);

    // Busca el skin en la base de datos
    $skin = Skin::find($request->input('id'));

    if ($skin) {
        // Actualiza los valores del objeto $skin con los nuevos valores del formulario
        $skin->nombre = $request->input('nombre');
        $skin->precio = $request->input('precio');
        $skin->imagen = $request->input('imagen');
        // Agrega más campos según tu base de datos

        // Guarda los cambios en la base de datos
        $skin->save();

        // Redirige a la vista correspondiente con un mensaje de éxito
        return redirect()->route('skins')->with('successModificar', 'Skin modificado correctamente');
    } else {
        // Redirige a la vista correspondiente con un mensaje de error
        return redirect()->route('skins')->with('errorModificar', 'Skin no encontrado');
    }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skin $skin)
    {
        // Eliminar el skin
        $skin->delete();

        // Puedes redirigir a alguna vista o realizar otras acciones después de eliminar
        return redirect()->route('skins');
    }
}
