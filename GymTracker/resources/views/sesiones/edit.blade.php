@extends('components.layouts.app.app')
@section('content')
<h1 class="text-xl font-bold mb-4">Editar Sesión</h1>
<form action="{{ route('sesiones.update', $sesion) }}" method="POST">
    @csrf
    @method('PUT')

    <label class="block mb-2">Fecha
        <input type="date" name="fecha" value="{{ old('fecha', $sesion->fecha->toDateString()) }}" class="p-2 border rounded" required>
    </label>

    <label class="block mb-4">Nota
        <textarea name="nota" class="w-full p-2 border rounded">{{ old('nota', $sesion->nota) }}</textarea>
    </label>

    <h2 class="font-bold mb-2">Series</h2>
    <div class="space-y-4 mb-4">
        @php
        $old = old('series', $sesion->series->map->only(['id_ejercicio','serie_num','repeticiones','peso'])->toArray());
        @endphp
        @foreach($old as $i => $serie)
        <div class="flex space-x-2 items-end">
            <select name="series[{{ $i }}][id_ejercicio]" class="p-2 border rounded">
                @foreach($ejercicios as $e)
                <option value="{{ $e->id_ejercicio }}" {{ $serie['id_ejercicio']==$e->id_ejercicio?'selected':'' }}>{{ $e->nombre }}</option>
                @endforeach
            </select>
            <input type="number" name="series[{{ $i }}][serie_num]" value="{{ $serie['serie_num'] }}" placeholder="#" class="w-16 p-2 border rounded" required>
            <input type="number" name="series[{{ $i }}][repeticiones]" value="{{ $serie['repeticiones'] }}" placeholder="Reps" class="w-16 p-2 border rounded" required>
            <input type="text" name="series[{{ $i }}][peso]" value="{{ $serie['peso'] }}" placeholder="Peso" class="w-20 p-2 border rounded" required>
        </div>
        @endforeach
    </div>

    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Actualizar</button>
</form>
@endsection
