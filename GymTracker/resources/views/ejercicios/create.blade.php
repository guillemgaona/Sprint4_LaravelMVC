@extends('components.layouts.app.app')

@section('content')
<h1 class="text-xl font-bold mb-4">Crear Ejercicio</h1>
<form action="{{ route('ejercicios.store') }}" method="POST"  enctype="multipart/form-data">
    @csrf

    <label class="block mb-2">Nombre
        <input name="nombre" value="{{ old('nombre') }}" class="w-full p-2 border rounded" required>
    </label>

    <label class="block mb-2">Grupo Muscular
        <select name="grupo_muscular" class="w-full p-2 border rounded" required>
            @foreach(['pecho','espalda','piernas','hombros','brazos','core','otros'] as $g)
            <option value="{{ $g }}" {{ old('grupo_muscular') == $g ? 'selected' : '' }}>{{ ucfirst($g) }}</option>
            @endforeach
        </select>
    </label>

    <label class="block mb-2">Descripción
        <textarea name="descripcion" class="w-full p-2 border rounded">{{ old('descripcion') }}</textarea>
    </label>

  <label class="block mb-4">
      Imagen Demo
      <input
        type="file"
        name="imagen_demo"
        accept="image/*"
        class="w-full p-2 border rounded"
      >
      @error('imagen_demo')
      <div class="text-red-500 mt-1">{{ $message }}</div>
    @enderror
    </label>

    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Crear</button>
</form>
@endsection