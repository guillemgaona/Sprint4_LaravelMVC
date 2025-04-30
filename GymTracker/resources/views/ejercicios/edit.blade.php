@extends('components.layouts.app.app')

@section('content')
<h1 class="text-xl font-bold mb-4">Editar Ejercicio</h1>
<form action="{{ route('ejercicios.update', $ejercicio) }}" method="POST">
    @csrf
    @method('PUT')

    <label class="block mb-2">Nombre
        <input name="nombre" value="{{ old('nombre', $ejercicio->nombre) }}" class="w-full p-2 border rounded" required>
    </label>

    <label class="block mb-2">Grupo Muscular
        <select name="grupo_muscular" class="w-full p-2 border rounded" required>
            @foreach(['pecho','espalda','piernas','hombros','brazos','core','otros'] as $g)
            <option value="{{ $g }}" {{ old('grupo_muscular', $ejercicio->grupo_muscular) == $g ? 'selected' : '' }}>{{ ucfirst($g) }}</option>
            @endforeach
        </select>
    </label>

    <label class="block mb-2">Descripción
        <textarea name="descripcion" class="w-full p-2 border rounded">{{ old('descripcion', $ejercicio->descripcion) }}</textarea>
    </label>

    <label class="block mb-4">URL Imagen Demo
        <input name="imagen_demo" value="{{ old('imagen_demo', $ejercicio->imagen_demo) }}" class="w-full p-2 border rounded">
    </label>

    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Actualizar</button>
</form>
@endsection