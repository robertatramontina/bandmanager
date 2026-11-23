@extends('layouts.master')

@section('content')
    <h1 class="mb-4">Dashboard</h1>

    <div class="alert alert-success">
        Olá, {{ Auth::user()->name }}. Bem-vindo(a) ao BandManager!
    </div>
    <p>Tipo de utilizador: {{ Auth::user()->role }}</p>

    <h4>Gestão do BandManager</h4>

    <p>Seleciona uma das opções para gerir os conteúdos.</p>

    <div class="d-flex gap-3 mt-4">

        <a href="{{ route('bands.index') }}" class="btn btn-primary">
            Ver Bandas
        </a>

        @if (Auth::user()->role == 'admin')
            <a href="{{ route('bands.create') }}" class="btn btn-success">
                Adicionar Banda
            </a>

            <a href="{{ route('albums.create') }}" class="btn btn-success">
                Adicionar Álbum
            </a>
        @endif

    </div>
@endsection
