@extends('layouts.master')

@section('content')
    <h1 class="mb-4">Lista de Bandas</h1>
    @auth
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('bands.create') }}" class="btn btn-success mb-3">
                Adicionar Banda
            </a>
        @endif
    @endauth

    <form action="{{ route('bands.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Pesquisar banda pelo nome..."
                value="{{ $search ?? '' }}">

            <button type="submit" class="btn btn-primary">
                Pesquisar
            </button>
            @if ($search)
                <a href="{{ route('bands.index') }}" class="btn btn-secondary">
                    Limpar pesquisa
                </a>
            @endif
        </div>
    </form>

    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>Fotografia</th>
                <th>Nome</th>
                <th>N.º de Álbuns</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($bands as $band)
                <tr>
                    <td>
                        @if ($band->photo)
                            <img src="{{ asset('storage/' . $band->photo) }}" alt="{{ $band->name }}" width="80">
                        @else
                            <img src="https://placehold.co/80x80" alt="Sem fotografia" width="80">
                        @endif
                    </td>
                    <td>{{ $band->name }}</td>
                    <td>{{ $band->albums_count }}</td>
                    <td>
                        {{-- Todos podem ver os albuns --}}
                        <a href="{{ route('bands.albums', $band->id) }}" class="btn btn-primary btn-sm">
                            Ver álbuns
                        </a>
                        {{-- Apenas utilizadores autenticados podem editar --}}
                        @auth
                            <a href="{{ route('bands.edit', $band->id) }}" class="btn btn-warning btn-sm">
                                Editar
                            </a>
                        @endauth

                        @auth
                            @if (Auth::user()->role == 'admin')
                                <form action="{{ route('bands.destroy', $band->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Tens a certeza que queres apagar esta banda?')">
                                        Apagar
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </td>
                </tr>
            @endforeach
            @if ($bands->isEmpty())
                <tr>
                    <td colspan="4" class="text-center text-muted py-4">
                        Nenhuma banda encontrada.
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
