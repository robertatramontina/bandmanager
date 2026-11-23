@extends('layouts.master')

@section('content')
    <h1 class="mb-4">Dashboard</h1>

    <div class="alert alert-success d-flex justify-content-between align-items-center">
    <span>Olá, {{ Auth::user()->name }}. Bem-vindo(a) ao BandManager!</span>

    <span class="badge bg-secondary">
        {{ Auth::user()->role == 'admin' ? 'Administrador' : 'Utilizador' }}
    </span>
</div>


    <div class="row mb-4">

    <div class="col-md-6 mb-3">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Total de Bandas</h5>
                <h2 class="text-primary">{{ $totalBands }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Total de Álbuns</h5>
                <h2 class="text-primary">{{ $totalAlbums }}</h2>
            </div>
        </div>
    </div>

</div>
   <div class="card shadow-sm mb-4">
    <div class="card-body">
        <h4 class="card-title mb-3">Gestão de Conteúdos</h4>

        <p class="text-muted">
            Consulta e gere as bandas musicais e os respetivos álbuns.
        </p>

        <div class="d-flex flex-wrap gap-3 mt-3">

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
    </div>
</div>
@endsection
