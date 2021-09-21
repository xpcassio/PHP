@extends('layout')

@section('cabecalho')
Episódios
@endsection

@section('conteudo')
<a href="{{ route('rota_series') }}" class="btn btn-lg btn-secondary mb-4">Voltar</a>

@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem  }}
</div>
@endif

<form action="/temporada/{{ $temporadaId }}/episodios/assistir" method="post">
    @csrf
    <ul class="list-group">
        @foreach($episodios as $episodio)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Episódio {{ $episodio->numero }}
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="episodios[]" value="{{ $episodio->id }}" id="flexCheckDefault" {{ $episodio->assistido ? 'checked' : '' }}>
                </div>
            </li>
        @endforeach
    </ul>

    <button class="btn btn-lg btn-outline-secondary mt-4 mb-5">Salvar</button>
</form>
@endsection