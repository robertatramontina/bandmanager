@extends('layouts.master')

@section('content')
    <h2>Álbuns de {{ $band->name }}</h2>

    <a href="{{ route('bands.index') }}" class="btn btn-secondary mb-3">
        Voltar às Bandas
    </a>

    @auth
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('albums.create') }}" class="btn btn-success mb-3">
                Adicionar Álbum
            </a>
        @endif
    @endauth

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Imagem</th>
                <th>Nome do Álbum</th>
                <th>Data de Lançamento</th>
                @auth
                    <th>Ações</th>
                @endauth
            </tr>
        </thead>

        <tbody>
            @forelse ($band->albums as $album)
                <tr>
                    <td>
                        @if ($album->image)
                            <img src="{{ asset('storage/' . $album->image) }}" alt="{{ $album->name }}" width="80">
                        @else
                            <img src="https://placehold.co/80x80" alt="Sem capa" width="80">
                        @endif
                    </td>

                    <td>{{ $album->name }}</td>

                    <td>{{ $album->release_date }}</td>
                    @auth
                        <td>

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

                        </td>
                @endif
            @endauth
            </tr>
        @empty
            <tr>
                <td colspan="{{ auth()->check() ? 4 : 3 }}" class="text-center">
                    Esta banda ainda não tem álbuns registados.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
