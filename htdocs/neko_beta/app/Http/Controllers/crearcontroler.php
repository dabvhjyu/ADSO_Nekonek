<?php

namespace App\Http\Controllers;

use App\Models\crear_serie;
use Illuminate\Http\Request;

class crearcontroler extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $serie = crear_serie::all();

        return view('neko.index',['series'=> $serie]);
        #$crear = crear_serie::all();
        #return view("neko/index", compact("crear"));
        #return view("neko/index",['crear'=> $crear]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("neko/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'titulo' => 'required|max:255',
        'subtitulo' => 'nullable|max:255',
        'descripcion' => 'required',
        'miniatura_vertical' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'genero_id' => 'required|exists:generos,id',
        'estado_id' => 'required|exists:estados,id'
    ]);

    // Guardar imagen
    if($request->hasFile('miniatura_vertical')) {
        $path = $request->file('miniatura_vertical')->store('public/series');
        $validated['miniatura_vertical'] = str_replace('public/', '', $path);
    }

    crear_serie::create($validated);

    return redirect()->route('neko.index')->with('success', 'Serie creada correctamente');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
