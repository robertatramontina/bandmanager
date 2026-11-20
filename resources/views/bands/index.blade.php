
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
            <tr>
                <td>
                    <img src="https://placehold.co/80x80"
                         alt="Fotografia da banda"
                         width="80">
                </td>
                <td>Metallica</td>
                <td>5</td>
                <td>
                    <a href="#" class="btn btn-primary btn-sm">
                        Ver álbuns
                    </a>
                </td>
            </tr>
        </tbody>
    </table>

@endsection
