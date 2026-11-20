
@extends('layouts.master')

@section('content')

    <h1 class="mb-4">Editar Álbum</h1>

    <form action="{{ route('albums.update', $album->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome do Álbum</label>
            <input type="text" class="form-control"
                   id="name" name="name"
                   value="{{ $album->name }}" required>
        </div>

        <div class="mb-3">
            <label for="release_date" class="form-label">Data de Lançamento</label>
            <input type="date" class="form-control"
                   id="release_date" name="release_date"
                   value="{{ $album->release_date }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Nova Capa</label>
            <input type="file" class="form-control"
                   id="image" name="image" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="band_id" class="form-label">Banda</label>
            <select class="form-select" id="band_id" name="band_id" required>
            @foreach ($bands as $band)
                <option value="{{ $band->id }}"
                    {{ $album->band_id == $band->id ? 'selected' : '' }}>
                    {{ $band->name }}
                </option>
            @endforeach
        </select>
        </div>

        <button type="submit" class="btn btn-primary">
            Guardar Alterações
        </button>

        <a href="/bands" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

@endsection
