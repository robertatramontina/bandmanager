
@extends('layouts.master')

@section('content')

    <h1 class="mb-4">Adicionar Álbum</h1>

    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome do Álbum</label>
            <input type="text" class="form-control"
                   id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="release_date" class="form-label">Data de Lançamento</label>
            <input type="date" class="form-control"
                   id="release_date" name="release_date" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Capa do Álbum</label>
            <input type="file" class="form-control"
                   id="image" name="image" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="band_id" class="form-label">Banda</label>
            <select class="form-select" id="band_id" name="band_id" required>
                <option value="">Selecionar banda</option>
                <option value="1">Metallica</option>
                <option value="2">Queen</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">
            Guardar Álbum
        </button>

        <a href="/bands" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

@endsection
