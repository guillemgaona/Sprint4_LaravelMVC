<?php
namespace App\Http\Controllers;
use App\Models\Ejercicio;
use Illuminate\Http\Request;

class EjercicioController extends Controller
{
    public function index()
    {
        $ejercicios = Ejercicio::paginate(10);
        return view('ejercicios.index', compact('ejercicios'));
    }

    public function create()
    {
        return view('ejercicios.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'grupo_muscular'=>'required|in:pecho,espalda,piernas,hombros,brazos,core,otros',
            'descripcion'=>'nullable|string',
            'imagen_demo'=>'nullable|url',
        ]);
        Ejercicio::create($data);
        return redirect()->route('ejercicios.index');
    }

    public function show(Ejercicio $ejercicio)
    {
        return view('ejercicios.show', compact('ejercicio'));
    }

    public function edit(Ejercicio $ejercicio)
    {
        return view('ejercicios.edit', compact('ejercicio'));
    }

    public function update(Request $request, Ejercicio $ejercicio)
    {
        $data = $request->validate([
            'nombre'=>'required|string|max:100',
            'grupo_muscular'=>'required|in:pecho,espalda,piernas,hombros,brazos,core,otros',
            'descripcion'=>'nullable|string',
            'imagen_demo'=>'nullable|url',
        ]);
        $ejercicio->update($data);
        return redirect()->route('ejercicios.index');
    }

    public function destroy(Ejercicio $ejercicio)
    {
        $ejercicio->delete();
        return back();
    }
}
