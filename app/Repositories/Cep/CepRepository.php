<?php
/**
 * Created by PhpStorm.
 * User: dlima
 * Date: 5/16/18
 * Time: 15:33
 */

namespace App\Repositories\Cep;


use App\Entities\City;
use App\Entities\State;
use App\Entities\Street;
use App\Exceptions\CepNotFoundException;
use App\Transformers\CityTransformer;
use App\Transformers\StateTransformer;
use App\Transformers\StreetTransformer;
use League\Fractal\Resource\Item;

class CepRepository
{
    public function find($cep)
    {
        if ($street = $this->findStreet($cep)){
            return new Item($street, new StreetTransformer);
        }

        if ($city = $this->findCity($cep)){
            return new Item($city, new CityTransformer);
        }

        if ($state = $this->findState($cep)){
            return new Item($state, new StateTransformer);
        }

        throw new CepNotFoundException;
    }

    /**
     * @param $cep
     * @return Street
     */
    public function findStreet($cep)
    {
        return Street::query()
                        ->where("cep", $cep)
                        ->first();
    }

    /**
     * @param $cep
     * @return Street
     */
    public function findCity($cep)
    {
        return City::query()
                        ->where("cep", $cep)
                        ->first();
    }

    /**
     * @param $cep
     * @return State
     */
    private function findState($cep)
    {
        return State::query()
                        ->select("*", \DB::raw("'$cep' as cep"))
                        ->where(function($query) use ($cep){
                            return $query
                                    ->whereRaw("$cep BETWEEN "
                                        . \DB::raw("CAST(faixa_cep1_ini AS UNSIGNED)")
                                            ." and "
                                        . \DB::raw("CAST(faixa_cep1_fim AS UNSIGNED)")
                                    );
                        })
                        ->orWhere(function($query) use ($cep){
                            return $query
                                    ->where("faixa_cep2_ini", "<>", "")
                                    ->where("faixa_cep2_fim", "<>", "")
                                    ->whereRaw("$cep BETWEEN "
                                        . \DB::raw("CAST(faixa_cep2_ini AS UNSIGNED)")
                                        ." and "
                                        . \DB::raw("CAST(faixa_cep2_fim AS UNSIGNED)")
                                    );
                        })
                        ->first();
    }
}