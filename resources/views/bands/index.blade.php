
@extends('layouts.master')

@section('content')

    <h1 class="mb-4">Lista de Bandas</h1>

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
                    <img src="https://placehold.co/80x80"
                         alt="Fotografia da banda"
                         width="80">
                </td>
                <td>{{ $band->name }}</td>
                <td>{{ $band->albums_count }}</td>
                <td>
                    {{-- Todos podem ver os albuns --}}
                    <a href="{{ route('bands.albums', $band->id)}}" class="btn btn-primary btn-sm">
                        Ver álbuns
                    </a>
                    {{-- Apenas utilizadores autenticados podem editar --}}
                    @auth
                    <a href="{{ route('bands.edit', $band->id) }}"
                    class="btn btn-warning btn-sm">
                    Editar
                    </a>
                    @endauth

                    @auth
                    @if (Auth::user()->role == 'admin')


                    <form action="{{ route('bands.destroy', $band->id) }}"
                          method="POST" class="d-inline">
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
        </tbody>
    </table>

@endsection
