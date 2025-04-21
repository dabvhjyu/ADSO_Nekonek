<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\crear_serie;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ImageController extends Controller
{
    use HasFactory;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $image = crear_serie::all();
        return view("series.index", compact("image"));
        
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
        //
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
