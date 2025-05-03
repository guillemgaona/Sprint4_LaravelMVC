<?php
namespace App\Http\Controllers;
use App\Models\Sesion;
use App\Models\Ejercicio;
use Illuminate\Http\Request;

class SesionController extends Controller
{
    public function index()
    {
        $sesiones = Sesion::withCount('series')->paginate(10);
        return view('sesiones.index', compact('sesiones'));
    }

    public function create(Request $request)
    {
        $ejercicios = Ejercicio::all();
        $numSeries = $request->get('numSeries', 1);
        return view('sesiones.create', compact('ejercicios', 'numSeries'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fecha'=>'required|date',
            'nota'=>'nullable|string',
            'series'=>'nullable|array',
            'series.*.id_ejercicio'=>'required|exists:ejercicio,id_ejercicio',
            'series.*.serie_num'=>'required|integer',
            'series.*.repeticiones'=>'required|integer',
            'series.*.peso'=>'required|numeric',
        ]);

        $sesion = Sesion::create($data);

        if(!empty($data['series'])){
            foreach($data['series'] as $s){
                $sesion->series()->create($s);
            }
        }

        return redirect()->route('sesiones.index');
    }

    public function show(Sesion $sesion)
    {
        $sesion->load('series.ejercicio');
        return view('sesiones.show', compact('sesion'));
    }

    public function edit(Request $request, Sesion $sesion)
    {
        $ejercicios = Ejercicio::all();
        $numSeries = $request->get('numSeries', $sesion->series->count());
        return view('sesiones.edit', compact('sesion','ejercicios','numSeries'));
    }

    public function update(Request $request, Sesion $sesion)
    {
        $data = $request->validate([
            'fecha'=>'required|date',
            'nota'=>'nullable|string',
            'series'=>'nullable|array',
            'series.*.id_serie'=>'nullable|integer|exists:serie,id_serie',
            'series.*.id_ejercicio'=>'required|exists:ejercicio,id_ejercicio',
            'series.*.serie_num'=>'required|integer',
            'series.*.repeticiones'=>'required|integer',
            'series.*.peso'=>'required|numeric',
        ]);

        $sesion->update($data);

      
        $sesion->series()->delete();
        if(!empty($data['series'])){
            foreach($data['series'] as $s){
                $sesion->series()->create([
                    'id_ejercicio'=>$s['id_ejercicio'],
                    'serie_num'=>$s['serie_num'],
                    'repeticiones'=>$s['repeticiones'],
                    'peso'=>$s['peso'],
                ]);
            }
        }

        return redirect()->route('sesiones.index');
    }

    public function destroy(Sesion $sesion)
    {
        $sesion->delete();
        return back();
    }
}
