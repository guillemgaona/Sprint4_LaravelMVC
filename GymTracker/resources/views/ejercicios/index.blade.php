@extends('components.layouts.app.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Ejercicios</h1>
    <a href="{{ route('ejercicios.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Nuevo</a>
</div>

<table class="table-auto w-full bg-white shadow rounded">
    <thead class="bg-gray-50">
        <tr>
            <th class="p-2 text-left">ID</th>
            <th class="p-2 text-left">Nombre</th>
            <th class="p-2 text-left">Grupo</th>
            <th class="p-2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($ejercicios as $e)
        <tr class="border-t">
            <td class="p-2 text-left">{{ $e->id_ejercicio }}</td>
            <td class="p-2 text-left">{{ $e->nombre }}</td>
            <td class="p-2 text-left">{{ ucfirst($e->grupo_muscular) }}</td>
            <td class="p-2 text-right">
                <a href="{{ route('ejercicios.show', $e) }}" class="text-blue-500">Ver</a>
                <a href="{{ route('ejercicios.edit', $e) }}" class="text-yellow-500 ml-2">Editar</a>
                <form action="{{ route('ejercicios.destroy', $e) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 ml-2">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">{{ $ejercicios->links() }}</div>
@endsection
