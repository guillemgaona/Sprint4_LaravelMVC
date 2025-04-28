@extends('components.layouts.app.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">{{ isset($ejercicio) ? 'Editar' : 'Nuevo' }} Ejercicio</h1>

<form action="{{ isset($ejercicio) ? route('ejercicios.update', $ejercicio) : route('ejercicios.store') }}" method="POST">
  @csrf @if(isset($ejercicio)) @method('PUT') @endif

  <div class="mb-4">
    <label>Nombre</label>
    <input type="text" name="nombre" value="{{ old('nombre', $ejercicio->nombre ?? '') }}" class="border p-2 w-full" required>
  </div>
  <div class="mb-4">
    <label>Grupo muscular</label>
    <select name="grupo_muscular" class="border p-2 w-full">
      @foreach(['pecho','espalda','piernas','hombros','brazos','core','otros'] as $g)
        <option value="{{ $g }}" {{ (old('grupo_muscular', $ejercicio->grupo_muscular ?? '') == $g) ? 'selected' : '' }}>{{ ucfirst($g) }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-4">
    <label>Descripción</label>
    <textarea name="descripcion" class="border p-2 w-full">{{ old('descripcion', $ejercicio->descripcion ?? '') }}</textarea>
  </div>
  <div class="mb-4">
    <label>URL Imagen demo</label>
    <input type="url" name="imagen_demo" value="{{ old('imagen_demo', $ejercicio->imagen_demo ?? '') }}" class="border p-2 w-full">
  </div>

  <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
</form>
@endsection