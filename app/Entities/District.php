<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /**
     * The table name
     *
     * @var string
     */
    protected $table = 'bairro';

    /**
     * Primary key name
     *
     * @var string
     */
    protected $primaryKey = 'id_bairro';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_uf',
        'id_cidade',
        'nome'
    ];
}
