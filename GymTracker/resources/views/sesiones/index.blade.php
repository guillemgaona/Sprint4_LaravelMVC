@extends('components.layouts.app.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Sesiones</h1>
    <a href="{{ route('sesiones.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Nueva</a>
</div>

<table class="table-auto w-full bg-white shadow rounded">
    <thead class="bg-gray-50">
        <tr>
            <th class="p-2 text-left">ID</th>
            <th class="p-2 text-left">Fecha</th>
            <th class="p-2 text-left">Número de Ejercicios</th>
            <th class="p-2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($sesiones as $s)
        <tr class="border-t">
            <td class="p-2">{{ $s->id_sesion }}</td>
            <td class="p-2">{{ $s->fecha->format('d/m/Y') }}</td>
            <td class="p-2">{{ $s->series_count }}</td>
            <td class="p-2 text-right">
                <a href="{{ route('sesiones.show', $s) }}" class="text-blue-500">Ver</a>
                <a href="{{ route('sesiones.edit', $s) }}" class="text-yellow-500 ml-2">Editar</a>
                <form action="{{ route('sesiones.destroy', $s) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 ml-2">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">{{ $sesiones->links() }}</div>
@endsection