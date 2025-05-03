@extends('components.layouts.app.app')
@section('content')
<h1 class="text-xl font-bold mb-4">Editar Sesión</h1>

@php
    $defaultCount = $sesion->series->count();
    $count = request()->get('numSeries', $defaultCount);
@endphp
<div class="flex justify-end mb-4">
    <a href="{{ route('sesiones.edit', ['sesion' => $sesion->id_sesion, 'numSeries' => $count + 1]) }}" 
       class="px-4 py-2 bg-gray-300 rounded">Añadir Serie</a>
</div>

<form action="{{ route('sesiones.update', $sesion) }}" method="POST">
    @csrf
    @method('PUT')

    <label class="block mb-2">Fecha
        <input type="date" name="fecha" 
               value="{{ old('fecha', $sesion->fecha->toDateString()) }}" 
               class="p-2 border rounded" required>
    </label>

    <label class="block mb-4">Nota
        <textarea name="nota" class="w-full p-2 border rounded">{{ old('nota', $sesion->nota) }}</textarea>
    </label>

    <h2 class="font-bold mb-2">Ejercicios ({{ $count }})</h2>
    <div class="space-y-4 mb-4">
        @php
            $old = old('series', []);
        @endphp
        @for($i = 0; $i < $count; $i++)
        @php
            $serieData = $old[$i] ?? ($sesion->series[$i]->toArray() ?? []);
        @endphp
        <div class="flex space-x-2 items-end">
            <select name="series[{{ $i }}][id_ejercicio]" class="p-2 border rounded" required>
                <option value="">-- Selecciona ejercicio --</option>
                @foreach($ejercicios as $e)
                <option value="{{ $e->id_ejercicio }}" 
                    {{ (isset($serieData['id_ejercicio']) && $serieData['id_ejercicio']==$e->id_ejercicio) ? 'selected' : '' }}>
                    {{ $e->nombre }}
                </option>
                @endforeach
            </select>
            <input type="number" name="series[{{ $i }}][serie_num]" 
                   value="{{ $serieData['serie_num'] ?? '' }}" 
                   placeholder="Nº" class="w-16 p-2 border rounded" required>
            <input type="number" name="series[{{ $i }}][repeticiones]" 
                   value="{{ $serieData['repeticiones'] ?? '' }}" 
                   placeholder="Reps" class="w-16 p-2 border rounded" required>
            <input type="text" name="series[{{ $i }}][peso]" 
                   value="{{ $serieData['peso'] ?? '' }}" 
                   placeholder="Peso" class="w-20 p-2 border rounded" required>
        </div>
        @endfor
    </div>

    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Actualizar</button>
</form>
@endsection