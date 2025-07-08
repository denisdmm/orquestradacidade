<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;

    protected $table = 'table_musica';

    protected $fillable = [
        'nome_musica',
        'tom_musica',
        'andamento',
        'compositor',
        'arranjo',
        'local_armario',
        'link_digital',
        'cantata',
        'nome_cantata'
    ];

    protected $casts = [
        'cantata' => 'boolean'
    ];

    /**
     * Relacionamento many-to-many com Evento
     */
    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'evento_musica');
    }

    /**
     * Relacionamento many-to-many com Instrumento
     */
    public function instrumentos()
    {
        return $this->belongsToMany(Instrumento::class, 'musica_instrumento');
    }
}

