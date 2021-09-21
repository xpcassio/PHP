<?php

namespace App\Services;

Use App\Models\Serie;

Use Illuminate\Support\Facades\DB;

class CriadorDeSeries
{
	public function criarSerie(string $nomeSerie, int $qtdTemporadas, int $epPorTemporada): Serie
	{
		// $nome = $request->nome;
        // $qtdTemporadas = $request->qtd_temporadas;

        // $serie = new Serie();
        // $serie->nome = $nome;
        // var_dump($serie->save());

        // Pega tudo que vem do request
        // Serie::create($request->all());

		$serie = null;

    	DB::beginTransaction();
        $serie = Serie::create(['nome' => $nomeSerie]);
        $this->criaTemporadas($qtdTemporadas, $epPorTemporada, $serie);
        DB::commit();

        return $serie;
	}

	private function criaTemporadas(int $qtdTemporadas, int $epPorTemporada, Serie $serie): void
    {
        for ($i = 0; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            $this->criaEpisodios($epPorTemporada, $temporada);
        }
    }



    private function criaEpisodios(int $epPorTemporada, \Illuminate\Database\Eloquent\Model $temporada): void

    {

        for ($j = 1; $j <= $epPorTemporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}