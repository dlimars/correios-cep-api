<?php
/**
 * Created by PhpStorm.
 * User: dlima
 * Date: 5/16/18
 * Time: 16:45
 */

namespace App\Transformers;


use App\Entities\Street;
use App\Repositories\Cep\Cep;
use League\Fractal\TransformerAbstract;

class StreetTransformer extends TransformerAbstract
{
    public function transform(Street $street)
    {
        return (new Cep(
            $street->cep,
            $street->nome,
            $street->complemento,
            $street->district->nome,
            $street->city->nome,
            $street->state->id_uf
        ))->toArray();
    }
}