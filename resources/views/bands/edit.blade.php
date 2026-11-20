
@extends('layouts.master')

@section('content')

    <h1 class="mb-4">Editar Banda</h1>

    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome da Banda</label>
            <input type="text" class="form-control"
                   id="name" name="name"
                   value="{{ $band->name }}" required>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Nova Fotografia</label>
            <input type="file" class="form-control"
                   id="photo" name="photo" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">
            Guardar Alterações
        </button>

        <a href="/bands" class="btn btn-secondary">
            Cancelar
        </a>
    </form>

@endsection
