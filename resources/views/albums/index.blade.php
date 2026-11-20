@extends('layouts.master')

@section('content')
    <h1 class="mb-4">Álbuns da Banda</h1>

    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>Capa</th>
                <th>Nome do Álbum</th>
                <th>Nome da Banda</th>
                <th>Data de Lançamento</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($albums as $album)
                <tr>
                    <td>
                        <img src="https://placehold.co/80x80" alt="Capa do álbum" width="80">
                    </td>
                    <td>{{ $album->name }}</td>
                    <td>{{ $album->band->name }}</td>
                    <td>{{ $album->release_date }}</td>
                    <td>
                        <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('albums.destroy', $album->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Tens a certeza que queres apagar este álbum?')">
                                Apagar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/bands" class="btn btn-secondary">
        Voltar às bandas
    </a>
@endsection
