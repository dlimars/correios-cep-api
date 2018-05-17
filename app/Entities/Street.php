<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    /**
     * The table name
     *
     * @var string
     */
    protected $table = 'endereco';

    /**
     * Primary key name
     *
     * @var string
     */
    protected $primaryKey = 'id_endereco';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_uf',
        'id_cidade',
        'id_bairro',
        'nome',
        'cep',
        'complemento'
    ];

    public function district()
    {
        return $this->belongsTo(District::class, 'id_bairro');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'id_cidade');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'id_uf');
    }
}
