@extends('components.layouts.app.app')
@section('title', 'Sesión ' . (optional($sesion->fecha)->format('d/m/Y') ?: 'sin fecha'))

@section('content')
<h1 class="text-2xl font-bold mb-4">
    Sesión @if($sesion->fecha) {{ $sesion->fecha->format('d/m/Y') }} @else (sin fecha) @endif
</h1>

@if($sesion->nota)
    <p class="mb-4">{{ $sesion->nota }}</p>
@endif

@if($sesion->series->isNotEmpty())
<table class="table-auto w-full bg-white shadow rounded">
    <thead class="bg-gray-50">
        <tr>
            <th class="p-2 text-left">Ejercicio</th>
            <th class="p-2 text-left">Serie</th>
            <th class="p-2 text-left">Reps</th>
            <th class="p-2 text-left">Peso</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sesion->series as $s)
        <tr class="border-t">
            <td class="p-2">{{ $s->ejercicio->nombre }}</td>
            <td class="p-2">{{ $s->serie_num }}</td>
            <td class="p-2">{{ $s->repeticiones }}</td>
            <td class="p-2">{{ $s->peso }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
    <p>No hay series registradas en esta sesión.</p>
@endif
@endsection

