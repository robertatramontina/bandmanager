@extends('layouts.master')

@section('content')

<div class="container mt-5">
    <h2 class="mb-4">Definir Nova Palavra-passe</h2>

    <p class="text-muted">
        Introduz o teu e-mail e a nova palavra-passe.
    </p>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email"
                   name="email"
                   id="email"
                   class="form-control"
                   value="{{ old('email', $request->email) }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Nova Palavra-passe</label>
            <input type="password"
                   name="password"
                   id="password"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">
                Confirmar Nova Palavra-passe
            </label>
            <input type="password"
                   name="password_confirmation"
                   id="password_confirmation"
                   class="form-control"
                   required>
        </div>

        <button type="submit" class="btn btn-primary">
            Redefinir Palavra-passe
        </button>
    </form>
</div>

@endsection
