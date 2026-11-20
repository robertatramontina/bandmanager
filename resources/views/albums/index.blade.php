
@extends('layouts.master')

@section('content')

    <h1 class="mb-4">Álbuns da Banda</h1>

    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>Capa</th>
                <th>Nome do Álbum</th>
                <th>Data de Lançamento</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <img src="https://placehold.co/80x80"
                         alt="Capa do álbum"
                         width="80">
                </td>
                <td>Master of Puppets</td>
                <td>03/03/1986</td>
            </tr>
        </tbody>
    </table>

    <a href="/bands" class="btn btn-secondary">
        Voltar às bandas
    </a>

@endsection
