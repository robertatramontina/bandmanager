@extends('layouts.master')

@section('content')

    <div class="bg-light rounded-3 p-5 mb-5 text-center">

        <h1 class="display-4 fw-bold mb-3">BandManager</h1>

        <p class="lead text-muted mb-4">
            Explora bandas musicais, descobre os seus álbuns
            e consulta as respetivas datas de lançamento.
        </p>

        <a href="{{ route('bands.index') }}" class="btn btn-primary btn-lg">
            Explorar Bandas
        </a>

    </div>

    <h2 class="mb-4 text-center">O que podes fazer no BandManager?</h2>

    <div class="row g-4 mb-5">

        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Bandas Musicais</h5>
                    <p class="card-text text-muted">
                        Consulta as bandas registadas e conhece
                        os seus álbuns.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Álbuns</h5>
                    <p class="card-text text-muted">
                        Descobre as capas e as datas de lançamento
                        dos álbuns de cada banda.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Gestão de Conteúdos</h5>
                    <p class="card-text text-muted">
                        Utilizadores autenticados podem gerir
                        os conteúdos de acordo com as suas permissões.
                    </p>
                </div>
            </div>
        </div>

    </div>

@endsection
