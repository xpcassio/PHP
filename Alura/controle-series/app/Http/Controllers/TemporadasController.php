<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Models\Serie;

class TemporadasController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index(int $serieId)
    {
        $serie = Serie::find($serieId);
        $temporadas = $serie->temporadas;
        // $temporadas = Temporada::query()->where('serie_id', $serieId)->orderBy('numero')->get();

        return view('temporadas.index', compact('serie', 'temporadas'));
    }
}
