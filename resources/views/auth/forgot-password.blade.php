@extends('layouts.master')

@section('content')

<div class="container mt-5">
    <h2 class="mb-4">Recuperar Palavra-passe</h2>

    <p class="text-muted">
        Introduz o teu e-mail para receberes um link de recuperação.
    </p>

    @if (session('status'))
    <div class="alert alert-success">
        Foi enviado um link de recuperação da palavra-passe para o teu e-mail.
    </div>
    @endif

    @if ($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>

            <input type="email"
                   name="email"
                   id="email"
                   class="form-control"
                   value="{{ old('email') }}"
                   required>
        </div>

        <button type="submit" class="btn btn-primary">
            Enviar link de recuperação
        </button>

        <a href="{{ route('login') }}" class="btn btn-secondary">
            Voltar ao Login
        </a>
    </form>
</div>

@endsection
