<?php

namespace App\Http\Controllers;

use App\Models\crear_serie;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class SerieController extends Controller
{
    use HasFactory;
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Verificación de autenticación + rol (más robusto)
    if (!auth()->check() || auth()->user()->rol_id_fk != 3) {
        abort(403, 'Acceso no autorizado. Se requiere rol de editor');
    }

    // Obtener datos con paginación (mejor performance)
    $series = crear_serie::paginate(10); // 10 items por página
    
    return view("series.index", compact("series"));
}


    public function biblioteca()
    {
        $series = crear_serie::all();
        return view('series.biblioteca', compact("series"));

    }

    public function principal()
    {
        $series = crear_serie::all();
        return view('series.principal', compact("series"));

    }

    
    

    






    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("series.crear");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validación corregida
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:150',
            'subtitulo' => 'nullable|string|max:100',
            'genero_id' => 'required|exists:generos,genero_id',
            'estado_id' => 'required|exists:estados,estado_id',
            'descripcion' => 'required|string|max:500',
            'miniatura_cuadrada' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'miniatura_vertical' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Procesamiento de imágenes
        $miniaturaCuadradaPath = $request->file('miniatura_cuadrada')->store('series/miniaturas', 'public');
        $miniaturaVerticalPath = $request->file('miniatura_vertical')->store('series/portadas', 'public');

        // Creación de la serie
        $crearSerie = Crear_Serie::create([
            'titulo' => $validatedData['titulo'],
            'subtitulo' => $validatedData['subtitulo'],
            'genero_id' => $validatedData['genero_id'],
            'estado_id' => $validatedData['estado_id'],
            'descripcion' => $validatedData['descripcion'],
            'miniatura_cuadrada' => $miniaturaCuadradaPath,
            'miniatura_vertical' => $miniaturaVerticalPath,
            'fecha_creacion' => now(),
            'ultima_actualizacion' => now()
        ]);

        return redirect()->route('series.biblioteca')->with('success', 'Serie creada exitosamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $seriecreada_id)
    {
        $serie = crear_serie::findOrFail($seriecreada_id);
        return view('series.show', compact('serie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $seriecreada_id)
    {
        $serie = crear_serie::findOrFail($seriecreada_id);
        return view('series.edit', compact('serie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $seriecreada_id)
    {
        // 1. Validación de datos (puedes hacer que las imágenes sean opcionales en update)
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:150',
            'subtitulo' => 'nullable|string|max:100',
            'genero_id' => 'required|exists:generos,genero_id',
            'estado_id' => 'required|exists:estados,estado_id',
            'descripcion' => 'required|string|max:500',
            'miniatura_cuadrada' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'miniatura_vertical' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // 2. Buscar la serie existente
        $serie = Crear_Serie::findOrFail($seriecreada_id);

        // 3. Procesar imágenes solo si se suben nuevas
        if ($request->hasFile('miniatura_cuadrada')) {
            $miniaturaCuadradaPath = $request->file('miniatura_cuadrada')->store('series/miniaturas', 'public');
            $serie->miniatura_cuadrada = $miniaturaCuadradaPath;
        }

        if ($request->hasFile('miniatura_vertical')) {
            $miniaturaVerticalPath = $request->file('miniatura_vertical')->store('series/portadas', 'public');
            $serie->miniatura_vertical = $miniaturaVerticalPath;
        }

        // 4. Actualizar los demás campos
        $serie->titulo = $validatedData['titulo'];
        $serie->subtitulo = $validatedData['subtitulo'];
        $serie->genero_id = $validatedData['genero_id'];
        $serie->estado_id = $validatedData['estado_id'];
        $serie->descripcion = $validatedData['descripcion'];

        // 5. Guardar los cambios
        $serie->save();

        // 6. Redirigir
        return redirect()->route('serie.index')->with('success', 'Serie actualizada exitosamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $seriecreada_id)
    {
        $serie = crear_serie::findOrFail($seriecreada_id);
        $serie->delete();
        return redirect()->route('serie.index');
    }
}
