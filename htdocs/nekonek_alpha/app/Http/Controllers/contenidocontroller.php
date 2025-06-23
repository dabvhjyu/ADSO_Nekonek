<?php

namespace App\Http\Controllers;

use App\Models\crear_serie;
use Illuminate\Http\Request;

class contenidocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function crear()
    {
        return view('neko.crear');
    }

    public function grupos()
    {
        $serie = crear_serie::all();
        
        return view('neko.grupos', compact('serie'));

    }

    public function index()

    {
        //
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
        {
            $request->validate([
                'titulo' => 'required|string|max:150',
                'subtitulo' => 'nullable|string|max:100',
                'genero_1_id' => 'required|exists:generos,genero_id',  // ¡Corregido! Apunta a genero_id
                'genero_2_id' => 'nullable|exists:generos,genero_id',  // Misma corrección aquí
                'descripcion' => 'required|string|max:500',
                
            ]);
    
    
            $crearSerie = new Crear_Serie();
            $crearSerie->titulo = $request->input('titulo');
            $crearSerie->subtitulo = $request->input('subtitulo');
            $crearSerie->genero_1_id = $request->input('genero_1_id');
            $crearSerie->genero_2_id = $request->input('genero_2_id');
            $crearSerie->descripcion = $request->input('descripcion');
            $crearSerie->miniatura_cuadrada = $request->input('miniatura_cuadrada');
            $crearSerie->miniatura_vertical = $request->input('miniatura_vertical');
            $crearSerie->fecha_creacion = now(); // Asigna la fecha y hora actual a `fecha_creacion`.
            $crearSerie->ultima_actualizacion = now(); // Asigna la fecha y hora actual a `ultima_actualizacion`.
            $crearSerie->save(); // Guarda la serie en la base de datos.
            return redirect()->back()->with('success', 'Serie creada'); // Redirige de vuelta a la vista anterior con un mensaje de éxito.
    
    
        }
        return redirect()->route('neko.grupos')->with('success', 'Serie actualizada'); 
    
    }

    /**
     * Display the specified resource.
     */
    public function show(crear_serie $crear_serie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(crear_serie $crear_serie)
    {
        return view('neko.editar',[
            'crear_serie' => $crear_serie,
        ]);

        return redirect()->route('neko.grupos')->with('success', 'Serie actualizada'); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, crear_serie $crear_serie)
    {
        $request->validate([
            'titulo' => 'required|string|max:150',
            'subtitulo' => 'nullable|string|max:100',
            'genero_1_id' => 'required|exists:generos,genero_id',  // ¡Corregido! Apunta a genero_id
            'genero_2_id' => 'nullable|exists:generos,genero_id',  // Misma corrección aquí
            'descripcion' => 'required|string|max:3000',
            
        ]);

        $crear_serie->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(crear_serie $crear_serie)
    {
        //
    }
}
