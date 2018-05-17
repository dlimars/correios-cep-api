<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * The table name
     *
     * @var string
     */
    protected $table = 'estado';

    /**
     * Primary key name
     *
     * @var string
     */
    protected $primaryKey = 'id_uf';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_uf',
        'nome',
        'faixa_cep1_ini',
        'faixa_cep1_fim',
        'faixa_cep2_ini',
        'faixa_cep2_fim',
    ];
}
