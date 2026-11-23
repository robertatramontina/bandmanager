@extends('layouts.master')

@section('content')

<div class="container mt-5">
    <h2>Login</h2>
    @if ($errors->has('email'))
        <div class="alert alert-danger" role="alert">
            O e-mail ou a palavra-passe estão incorretos.
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password"
                   class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">
            Entrar
        </button>
        <div class="mt-3">
    <a href="{{ route('password.request') }}">
        Esqueceste-te da palavra-passe?
    </a>
</div>
    </form>
</div>

@endsection
