@extends('layouts.master')

@section('content')
    <h2>Álbuns de {{ $band->name }}</h2>

    <a href="{{ route('bands.index') }}" class="btn btn-secondary mb-3">
        Voltar às Bandas
    </a>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Imagem</th>
                <th>Nome do Álbum</th>
                <th>Data de Lançamento</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($band->albums as $album)
                <tr>
                    <td>
                        <img src="https://placehold.co/80x80" alt="Capa do álbum" width="80">
                    </td>

                    <td>{{ $album->name }}</td>

                    <td>{{ $album->release_date }}</td>

                    <td>
                        @auth
                            <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            @if (Auth::user()->role == 'admin')
                                <form action="{{ route('albums.destroy', $album->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Tens a certeza que queres apagar este álbum?')">
                                        Apagar
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        Esta banda ainda não tem álbuns registados.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
