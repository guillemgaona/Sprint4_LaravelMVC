<?php

namespace App\Http\Controllers;

use App\Models\Sesion;
use App\Models\Ejercicio;
use Illuminate\Http\Request;

class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sesiones = Sesion::with('series.ejercicio')->orderBy('fecha','desc')->get();
        return view('sesions.index', compact('sesiones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ejercicios = Ejercicio::all();
        return view('sesions.create', compact('ejercicios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'fecha'=>'required|date',
            'nota'=>'nullable|string',
            'series'=>'required|array'
        ]);

        $sesion = Sesion::create($data);
        foreach ($data['series'] as $serie) {
            $sesion->series()->create($serie);
        }

        return redirect()->route('sesions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sesion $sesion)
    {
        $sesion->load('series.ejercicio');
        return view('sesions.show', compact('sesion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sesion $sesion)
    {
        $sesion->load('series');
        $ejercicios = Ejercicio::all();
        return view('sesions.edit', compact('sesion','ejercicios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sesion $sesion)
    {
        $data = $request->validate([
            'fecha'=>'required|date',
            'nota'=>'nullable|string',
            'series'=>'required|array'
        ]);

        $sesion->update($data);
        $sesion->series()->delete();
        foreach ($data['series'] as $serie) {
            $sesion->series()->create($serie);
        }

        return redirect()->route('sesions.show', $sesion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sesion $sesion)
    {
        $sesion->delete();
        return redirect()->route('sesions.index');
    }
}
