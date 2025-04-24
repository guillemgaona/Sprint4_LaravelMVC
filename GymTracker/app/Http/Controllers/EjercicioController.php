<?php

namespace App\Http\Controllers;
use App\Models\Ejercicio;
use Illuminate\Http\Request;

class EjercicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ejercicios = Ejercicio::orderBy('nombre')->get();
        return view('ejercicios.index', compact('ejercicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ejercicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'=>'required|max:100',
            'grupo_muscular'=>'required|in:pecho,espalda,piernas,hombros,brazos,core,otros',
            'descripcion'=>'nullable',
            'imagen_demo'=>'nullable|url'
        ]);
        Ejercicio::create($data);
        return redirect()->route('ejercicios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ejercicio $ejercicio)
    {
        return view('ejercicios.show', compact('ejercicio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ejercicio $ejercicio)
    {
        return view('ejercicios.edit', compact('ejercicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ejercicio $ejercicio)
    {
        $data = $request->validate([
            'nombre'=>'required|max:100',
            'grupo_muscular'=>'required|in:pecho,espalda,piernas,hombros,brazos,core,otros',
            'descripcion'=>'nullable',
            'imagen_demo'=>'nullable|url'
        ]);
        $ejercicio->update($data);
        return redirect()->route('ejercicios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ejercicio $ejercicio)
    {
        $ejercicio->delete();
        return redirect()->route('ejercicios.index');
    }
}
