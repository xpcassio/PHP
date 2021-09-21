@extends('layout')

@section('cabecalho')
Adicionar
@endsection

@section('conteudo')
<a href="{{ route('rota_series') }}" class="btn btn-lg btn-secondary mb-4">Voltar</a>

{{-- Não precisa desse empty ai, mas fica o exemplo --}}
@includeWhen(!empty($mensagem), 'mensagem', ['mensagem' => $mensagem]);

<form action="" method="post">
	@csrf {{-- https://laravel.com/docs/8.x/csrf#csrf-introduction --}}
	<div class="row mb-3">
		<div class="col-6">
			<div>
				<label for="idNome" class="form-label">Nome</label>
				<input type="text" class="form-control" id="idNome" name="nome">
			</div>
		</div>
		<div class="col-3">
			<div>
				<label for="qtd_temporadas" class="form-label">N° temporadas</label>
            	<input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
			</div>
		</div>
		<div class="col-3">
			<div>
				<label for="ep_por_temporada" class="form-label">Ep. por temporada</label>
            	<input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada">
			</div>
		</div>
	</div>	

	<button type="submit" class="btn btn-lg btn-outline-secondary mt-4">Add</button>
</form>
@endsection