<?php
/**
 * Created by PhpStorm.
 * User: dlima
 * Date: 5/16/18
 * Time: 16:45
 */

namespace App\Transformers;


use App\Entities\City;
use App\Repositories\Cep\Cep;
use League\Fractal\TransformerAbstract;

class CityTransformer extends TransformerAbstract
{
    public function transform(City $city)
    {
        return (new Cep(
            $city->cep,
            '',
            '',
            '',
            $city->nome,
            $city->state->id_uf
        ))->toArray();
    }
}