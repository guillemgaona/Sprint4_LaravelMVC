@extends('components.layouts.app.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">Ejercicios</h1>
<a href="{{ route('ejercicios.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Nuevo Ejercicio</a>
<table class="w-full bg-white rounded shadow">
  <thead class="bg-gray-100">
    <tr><th class="p-2">Nombre</th><th>Grupo</th><th>Acciones</th></tr>
  </thead>
  <tbody>
    @foreach($ejercicios as $e)
    <tr>
      <td class="p-2">{{ $e->nombre }}</td>
      <td>{{ ucfirst($e->grupo_muscular) }}</td>
      <td class="p-2 space-x-2">
        <a href="{{ route('ejercicios.show', $e) }}" class="text-blue-500">Ver</a>
        <a href="{{ route('ejercicios.edit', $e) }}" class="text-yellow-500">Editar</a>
        <form action="{{ route('ejercicios.destroy', $e) }}" method="POST" class="inline">
          @csrf @method('DELETE')
          <button type="submit" class="text-red-600">Eliminar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection