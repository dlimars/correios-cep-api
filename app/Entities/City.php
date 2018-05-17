<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The table name
     *
     * @var string
     */
    protected $table = 'cidade';

    /**
     * Primary key name
     *
     * @var string
     */
    protected $primaryKey = 'id_cidade';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'id_uf',
        'cep'
    ];

    public function state()
    {
        return $this->belongsTo(State::class, 'id_uf');
    }
}
