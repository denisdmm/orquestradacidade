<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instrumento extends Model
{
	use HasFactory;

	protected $table = 'table_instrumento';

	protected $fillable = [
		'nome_instrumento',
		'afinacao',
		'naipe',
	];

	public function musica()
	{
		return $this->belongsToMany(Musica::class, 'musica_instrumento')
;
	}
}
