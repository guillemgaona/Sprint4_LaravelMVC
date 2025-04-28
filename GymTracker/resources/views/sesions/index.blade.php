@extends('components.layouts.app.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">Sesiones</h1>
<a href="{{ route('sesions.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Nueva Sesión</a>
@foreach($sesiones as $sesion)
  <div class="bg-white rounded shadow p-4 mb-4">
    <div class="flex justify-between">
      <a href="{{ route('sesions.show', $sesion) }}" class="font-semibold">{{ $sesion->fecha->format('d/m/Y') }}</a>
      <div>
        <a href="{{ route('sesions.edit', $sesion) }}" class="text-yellow-500">Editar</a>
        <form action="{{ route('sesions.destroy', $sesion) }}" method="POST" class="inline">
          @csrf @method('DELETE')
          <button type="submit" class="text-red-600 ml-2">Eliminar</button>
        </form>
      </div>
    </div>
    <table class="w-full text-sm mt-2">
      <thead><tr><th>Ejercicio</th><th>S</th><th>Rep</th><th>Peso (kg)</th></tr></thead>
      <tbody>
        @foreach($sesion->series as $serie)
        <tr>
          <td>{{ $serie->ejercicio->nombre }}</td>
          <td>{{ $serie->serie_num }}</td>
          <td>{{ $serie->repeticiones }}</td>
          <td>{{ $serie->peso }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endforeach
@endsection