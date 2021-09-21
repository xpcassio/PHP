@extends('layout')

@section('cabecalho')
Series
@endsection

@section('conteudo')
<a href="{{ route('rota_series_criar') }}" class="btn btn-lg btn-secondary mb-4">Adicionar</a>

@if(!empty($mensagem))
<div class="alert alert-success" role="alert">
  {{ $mensagem }}
</div>
@endif

<ul class="list-group">
	@foreach ($series as $serie)
    	<li class="list-group-item d-flex justify-content-between align-items-center">
    		<span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

    		<div class="input-group input-group-sm w-50" hidden id="input-nome-serie-{{ $serie->id }}">
	            <input type="text" class="form-control" value="{{ $serie->nome }}">
                <button class="btn btn-outline-secondary" onclick="editarSerie({{ $serie->id }})">
                    <i class="fas fa-check"></i>
                </button>
	            {{-- @csrf --}}
	        </div>

    		<span class="d-flex">
    			{{-- EDITAR NOME --}}
    			<button class="btn btn-primary btn-sm me-2 text-white" onclick="toggleInput({{ $serie->id }})">
		            <i class="fas fa-edit"></i>
		        </button>

	    		{{-- TEMPORADAS --}}
	    		<a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm me-2 text-white">
		            <i class="fas fa-external-link-alt"></i>
		        </a>

	    		{{-- DELETAR --}}
	    		<form action="/series/remover/{{ $serie->id }}" method="post">
	    			@csrf {{-- https://laravel.com/docs/8.x/csrf#csrf-introduction --}}
	    			@method('DELETE')
	    			<button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
	    		</form>
	    	</span>
    	</li>
	@endforeach
</ul>

<script>
	function toggleInput(serieId) {
	    const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
	    const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
	    if (nomeSerieEl.hasAttribute('hidden')) {
	        nomeSerieEl.removeAttribute('hidden');
	        inputSerieEl.hidden = true;
	    } else {
	        inputSerieEl.removeAttribute('hidden');
	        nomeSerieEl.hidden = true;
	    }
	}

	function editarSerie(serieId) {
	    let formData = new FormData();
	    const nome = document.querySelector(`#input-nome-serie-${serieId} > input`).value;
	    const token = document.querySelector(`input[name="_token"]`).value;

	    formData.append('nome', nome);
	    formData.append('_token', token);

	    const url = `/series/${serieId}/editaNome`;
	    fetch(url, {method: 'POST', body: formData}).then(() => {
		    toggleInput(serieId);
		    document.getElementById(`nome-serie-${serieId}`).textContent = nome;
		});
	}
</script>
@endsection