<?php
/**
 * Created by PhpStorm.
 * User: dlima
 * Date: 5/16/18
 * Time: 16:45
 */

namespace App\Transformers;


use App\Entities\City;
use App\Entities\State;
use App\Repositories\Cep\Cep;
use League\Fractal\TransformerAbstract;

class StateTransformer extends TransformerAbstract
{
    public function transform(State $state)
    {
        return (new Cep(
            $state->cep,
            '',
            '',
            '',
            '',
            $state->id_uf
        ))->toArray();
    }
}