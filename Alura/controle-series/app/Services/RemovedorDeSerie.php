<?php

namespace App\Services;

Use Illuminate\Support\Facades\DB;

Use App\Models\{Serie, Temporada, Episodio};

class RemovedorDeSerie
{
    public function removerSerie(int $serieId): string
    {
        $nomeSerie = '';
        DB::transaction(function () use ($serieId, &$nomeSerie) {
            $serie = Serie::find($serieId);
            $nomeSerie = $serie->nome;

            $this->removerTemporadas($serie);
            $serie->delete();
        });

        return $nomeSerie;
    }

    public function removerTemporadas(Serie $serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada) {
           $this->removerEpisodios($temporada);
           $temporada->delete();
        });
    }

    public function removerEpisodios(Temporada $temporada): void
    {
        $temporada->episodios()->each(function (Episodio $episodio) {
            $episodio->delete();
        });

    }
}