<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'nome_evento',
        'data_evento',
        'tema_evento',
        'roupa_evento',
        'local_evento'
    ];

    protected $casts = [
        'data_evento' => 'date'
    ];

    /**
     * Relacionamento many-to-many com Musica
     */
    public function musicas()
    {
        return $this->belongsToMany(Musica::class, 'evento_musica');
    }
}
