@extends('components.layouts.app.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">{{ $ejercicio->nombre }}</h1>
<p><strong>Grupo:</strong> {{ ucfirst($ejercicio->grupo_muscular) }}</p>
<p><strong>Descripción:</strong> {{ $ejercicio->descripcion }}</p>
@if($ejercicio->imagen_demo)
  <img src="{{ $ejercicio->imagen_demo }}" class="mt-4 max-w-xs">
@endif
<a href="{{ route('ejercicios.index') }}" class="mt-4 inline-block">Volver</a>
@endsection