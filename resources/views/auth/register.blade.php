@extends('layouts.master')

@section('content')

<div class="container mt-5">
    <h2>Registar Utilizador</h2>

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name"
                   class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email"
                   class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">
                Confirmar Password
            </label>
            <input type="password" name="password_confirmation"
                   id="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">
            Registar
        </button>
    </form>
</div>

@endsection
