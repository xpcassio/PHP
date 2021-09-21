@extends('layout')

@section('cabecalho')
Temporadas de {{ $serie->nome }}
@endsection

@section('conteudo')
<a href="{{ route('rota_series') }}" class="btn btn-lg btn-secondary mb-4">Voltar</a>

<ul class="list-group mb-5">
    @foreach($temporadas as $temporada)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/temporadas/{{ $temporada->id }}/episodios">
                Temporada {{ $temporada->numero }}
            </a>
            <span class="badge bg-primary">{{ $temporada->getEpisodiosAssistidos()->count() }} / {{ $temporada->episodios->count() }}</span>
        </li>
    @endforeach
</ul>
@endsection