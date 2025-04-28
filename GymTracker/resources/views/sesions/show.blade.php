@extends('components.layouts.app.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">Sesión {{ $sesion->fecha->format('d/m/Y') }}</h1>

@if($sesion->nota)
  <p class="mb-4"><strong>Nota:</strong> {{ $sesion->nota }}</p>
@endif

<table class="w-full bg-white rounded shadow mb-4">
  <thead class="bg-gray-100">
    <tr><th class="p-2">Ejercicio</th><th>S</th><th>Rep</th><th>Peso (kg)</th></tr>
  </thead>
  <tbody>
    @foreach($sesion->series as $serie)
    <tr>
      <td class="p-2">{{ $serie->ejercicio->nombre }}</td>
      <td class="p-2 text-center">{{ $serie->serie_num }}</td>
      <td class="p-2 text-center">{{ $serie->repeticiones }}</td>
      <td class="p-2 text-center">{{ $serie->peso }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<a href="{{ route('sesions.edit', $sesion) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Editar</a>
<form action="{{ route('sesions.destroy', $sesion) }}" method="POST" class="inline">
  @csrf @method('DELETE')
  <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded ml-2">Eliminar</button>
</form>
<a href="{{ route('sesions.index') }}" class="ml-4">Volver</a>
@endsection
