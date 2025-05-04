@extends('components.layouts.app.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">{{ $ejercicio->nombre }}</h1>
<p><strong>Grupo:</strong> {{ ucfirst($ejercicio->grupo_muscular) }}</p>
<p class="mt-2">{{ $ejercicio->descripcion }}</p>
@if($ejercicio->imagen_demo_url)
<img
  src="{{ $ejercicio->imagen_demo_url }}"
  alt="Demo {{ $ejercicio->nombre }}"
  class="mt-4 w-48 h-auto rounded shadow"
>
@endif
@endsection