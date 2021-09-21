@extends('layout')

@section('cabecalho')
Registrar-se
@endsection

@section('conteudo')
<a href="/entrar" class="btn btn-lg btn-secondary mb-4">Entrar</a>

@include('erros', ['errors' => $errors])

<form action="" method="post">
    @csrf {{-- https://laravel.com/docs/8.x/csrf#csrf-introduction --}}
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div>
        <label for="password" class="form-label">Senha</label>
        <input type="password" class="form-control" required min="1" name="password" id="password">
    </div>

    <button type="submit" class="btn btn-lg btn-outline-secondary mt-4">Registrar</button>
</form>
@endsection