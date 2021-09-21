<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
	// Não necessario caso siga o fluxo de nome da classe e da tabela
	protected $table = "series";
	
	// Caso não queira que salve o timestamp
	public $timestamps = false;

	// Caso queira utilizar ::create([]) precisa definir os campos
	protected $fillable = ['nome'];

	public function temporadas()
	{
		return $this->hasMany(Temporada::class);
	}
}