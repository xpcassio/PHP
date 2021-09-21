<?php

namespace App\Http\Controllers;

Use Illuminate\Http\Request;

Use App\Models\Serie;
Use App\Models\Temporada;
Use App\Models\Episodio;

Use App\Http\Requests\SeriesFormRequest;

Use App\Services\CriadorDeSeries;
Use App\Services\RemovedorDeSerie;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
    	// echo "Deveria ter aqui uma lista de series.";
    	// echo "<br>";
    	// echo $request->url();
    	// echo "<br>";
    	// var_dump($request->query());
        $mensagem = $request->session()->get('mensagem');
        $series = Serie::query()->orderBy('nome')->get();

        return view('series.index', compact('series', 'mensagem'));
    }

    public function criar() {
        return view('series.criar');   
    }

    public function store(SeriesFormRequest $request, CriadorDeSeries $criadorDeSerie)
    {
        $serie = $criadorDeSerie->criarSerie($request->nome, $request->qtd_temporadas, $request->ep_por_temporada);
        

        // flash se remove apos utilizar a primeira vez
        $request->session()->flash('mensagem', "Série {$serie->id} e duas temporadas e episódios criados com sucesso {$serie->nome}.");
        return redirect(route('rota_series'));
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);

        $request->session()->flash('mensagem',"Série $nomeSerie removida com sucesso");
        return redirect(route('rota_series'));
    }

    public function editaNome(int $id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }
}
