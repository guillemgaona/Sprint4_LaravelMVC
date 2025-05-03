@extends('components.layouts.app.app')

@section('content')
<h1 class="text-xl font-bold mb-4">Crear Sesión</h1>


@php
    $count = request()->get('numSeries', 1);
@endphp
<div class="flex justify-end mb-4">
    <a href="{{ route('sesiones.create', ['numSeries' => $count + 1]) }}" 
       class="px-4 py-2 bg-gray-300 rounded">Añadir Serie</a>
</div>

<form action="{{ route('sesiones.store') }}" method="POST">
    @csrf

    <label class="block mb-2">Fecha
        <input type="date" name="fecha" value="{{ old('fecha') }}" class="p-2 border rounded" required>
    </label>

    <label class="block mb-4">Nota
        <textarea name="nota" class="w-full p-2 border rounded">{{ old('nota') }}</textarea>
    </label>

    <h2 class="font-bold mb-2">Ejercicios ({{ $count }})</h2>
    <div class="space-y-4 mb-4">
        @for($i = 0; $i < $count; $i++)
        <div class="flex space-x-2 items-end">
            <select name="series[{{ $i }}][id_ejercicio]" class="p-2 border rounded" required>
                <option value="">-- Selecciona ejercicio --</option>
                @foreach($ejercicios as $e)
                <option value="{{ $e->id_ejercicio }}" 
                    {{ old("series.$i.id_ejercicio") == $e->id_ejercicio ? 'selected' : '' }}>
                    {{ $e->nombre }}
                </option>
                @endforeach
            </select>
            <input type="number" name="series[{{ $i }}][serie_num]" 
                   value="{{ old("series.$i.serie_num") }}" 
                   placeholder="Nº" class="w-16 p-2 border rounded" required>
            <input type="number" name="series[{{ $i }}][repeticiones]" 
                   value="{{ old("series.$i.repeticiones") }}" 
                   placeholder="Reps" class="w-16 p-2 border rounded" required>
            <input type="text" name="series[{{ $i }}][peso]" 
                   value="{{ old("series.$i.peso") }}" 
                   placeholder="Peso" class="w-20 p-2 border rounded" required>
        </div>
        @endfor
    </div>

    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Crear</button>
</form>
@endsection