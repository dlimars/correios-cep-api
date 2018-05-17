<?php
/**
 * Created by PhpStorm.
 * User: dlima
 * Date: 5/16/18
 * Time: 15:44
 */

namespace App\Exceptions;


class CepNotFoundException extends \Exception
{
    protected $message = "Cep not found";
}