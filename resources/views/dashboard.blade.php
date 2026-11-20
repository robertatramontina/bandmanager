
@extends('layouts.master')

@section('content')

    <h1 class="mb-4">Dashboard</h1>

    <div class="alert alert-success">
        Bem-vindo ao BandManager!
    </div>

    <h4>Gestão do BandManager</h4>

    <p>Seleciona uma das opções para gerir os conteúdos.</p>

    <div class="d-flex gap-3 mt-4">

        <a href="/bands" class="btn btn-primary">
            Ver Bandas
        </a>

        <a href="/bands/create" class="btn btn-success">
            Adicionar Banda
        </a>

        <a href="/albums/create" class="btn btn-success">
            Adicionar Álbum
        </a>

    </div>

@endsection
