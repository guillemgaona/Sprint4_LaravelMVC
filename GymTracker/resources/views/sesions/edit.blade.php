@extends('components.layouts.app.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">Editar Sesión</h1>

<form action="{{ route('sesions.update', $sesion) }}" method="POST">
  @csrf @method('PUT')

  <div class="mb-4">
    <label class="block font-medium">Fecha</label>
    <input type="date" name="fecha" value="{{ old('fecha', $sesion->fecha->toDateString()) }}"
           class="border p-2 w-full @error('fecha') border-red-500 @enderror" required>
    @error('fecha')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
  </div>

  <div class="mb-4">
    <label class="block font-medium">Nota</label>
    <textarea name="nota" class="border p-2 w-full @error('nota') border-red-500 @enderror">{{ old('nota', $sesion->nota) }}</textarea>
    @error('nota')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
  </div>

  <h2 class="font-semibold mb-2">Series</h2>
  <div id="series-container">
    <template id="serie-template">
      <div class="flex space-x-2 mb-2 series-item">
        <select name="series[][ejercicio_id]" class="border p-2">
          @foreach($ejercicios as $e)
            <option value="{{ $e->id }}">{{ $e->nombre }}</option>
          @endforeach
        </select>
        <input type="number" name="series[][serie_num]" placeholder="S"
               class="border p-2 w-16" required>
        <input type="number" name="series[][repeticiones]" placeholder="Rep"
               class="border p-2 w-20" required>
        <input type="number" step="0.01" name="series[][peso]" placeholder="Peso"
               class="border p-2 w-20" required>
        <button type="button" onclick="this.closest('.series-item').remove()"
                class="text-red-500">✕</button>
      </div>
    </template>

    @foreach($sesion->series as $s)
      <div class="flex space-x-2 mb-2 series-item">
        <select name="series[][ejercicio_id]" class="border p-2">
          @foreach($ejercicios as $e)
            <option value="{{ $e->id }}" @selected($e->id == $s->ejercicio_id)>{{ $e->nombre }}</option>
          @endforeach
        </select>
        <input type="number" name="series[][serie_num]" value="{{ $s->serie_num }}"
               class="border p-2 w-16" required>
        <input type="number" name="series[][repeticiones]" value="{{ $s->repeticiones }}"
               class="border p-2 w-20" required>
        <input type="number" step="0.01" name="series[][peso]" value="{{ $s->peso }}"
               class="border p-2 w-20" required>
        <button type="button" onclick="this.closest('.series-item').remove()"
                class="text-red-500">✕</button>
      </div>
    @endforeach
  </div>

  <button type="button" onclick="addSerie()"
          class="bg-green-500 text-white px-4 py-2 rounded mt-2">Añadir Serie</button>
  <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded ml-2">Actualizar</button>
</form>

<script>
  function addSerie() {
    const tmpl = document.getElementById('serie-template').content.cloneNode(true);
    document.getElementById('series-container').appendChild(tmpl);
  }
</script>
@endsection