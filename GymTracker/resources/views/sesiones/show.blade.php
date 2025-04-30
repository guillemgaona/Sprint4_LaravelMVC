@section('title', 'Sesión ' . $sesion->fecha->format('d/m/Y'))
@section('content')
<h1 class="text-2xl font-bold mb-4">Sesión {{ $sesion->fecha->format('d/m/Y') }}</h1>
<p>{{ $sesion->nota }}</p>

<table class="w-full bg-white shadow rounded mt-4">
    <thead class="bg-gray-50">
        <tr>
            <th>Ejercicio</th>
            <th>#</th>
            <th>Reps</th>
            <th>Peso</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sesion->series as $s)
        <tr class="border-t">
            <td class="p-2">{{ $s->ejercicio->nombre }}</td>
            <td>{{ $s->serie_num }}</td>
            <td>{{ $s->repeticiones }}</td>
            <td>{{ $s->peso }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
