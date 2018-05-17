<?php
/**
 * Created by PhpStorm.
 * User: dlima
 * Date: 5/16/18
 * Time: 19:11
 */

namespace App\Repositories\Cep;


use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class Cep implements Arrayable, Jsonable
{
    /**
     * @var string
     */
    private $cep;

    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $complement;

    /**
     * @var string
     */
    private $district;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $state;

    /**
     * Cep constructor.
     * @param $cep
     * @param string $street
     * @param string $complement
     * @param string $district
     * @param string $city
     * @param string $state
     */
    public function __construct($cep, $street = '', $complement = '', $district = '', $city = '', $state = '')
    {
        $this->cep = $cep;
        $this->street = $street;
        $this->complement = $complement;
        $this->district = $district;
        $this->city = $city;
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * @param string $complement
     */
    public function setComplement($complement)
    {
        $this->complement = $complement;
    }

    /**
     * @return string
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param string $district
     */
    public function setDistrict($district)
    {
        $this->district = $district;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'cep'           => $this->getCep(),
            'logradouro'    => $this->getStreet(),
            'complemento'   => $this->getComplement(),
            'bairro'        => $this->getDistrict(),
            'cidade'        => $this->getCity(),
            'uf'            => $this->getState(),
        ];
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}