@extends('components.layouts.app.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">{{ $ejercicio->nombre }}</h1>
<p><strong>Grupo:</strong> {{ ucfirst($ejercicio->grupo_muscular) }}</p>
<p class="mt-2">{{ $ejercicio->descripcion }}</p>
@if($ejercicio->imagen_demo)
<img src="{{ $ejercicio->imagen_demo }}" alt="Demo" class="mt-4 rounded shadow">
@endif
@endsection