<?php

namespace App\Http\Controllers;

use App\Repositories\Cep\CepRepository;
use League\Fractal\Manager;

class CepController extends Controller
{
    /**
     * @var CepRepository
     */
    private $cepRepository;

    /**
     * CepController constructor.
     * @param CepRepository $cepRepository
     */
    public function __construct(CepRepository $cepRepository)
    {
        $this->cepRepository = $cepRepository;
    }

    /**
     * Find address by CEP.
     *
     * @param $cep
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show($cep)
    {
        try {

            $manager    = new Manager();
            $resource   = $this->cepRepository->find($cep);
            $response   = (object) $manager->createData($resource)->toArray();
            return $this->jsonResponse(true, 'OK', $response->data);

        } catch (\Exception $e) {

            return $this->jsonResponse(false, $e->getMessage());

        }
    }
}
