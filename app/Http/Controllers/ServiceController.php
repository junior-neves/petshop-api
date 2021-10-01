<?php

namespace App\Http\Controllers;

use App\Services\Contracts\ServiceServiceInterface;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller;

class ServiceController extends Controller
{
    private ServiceServiceInterface $serviceService;

    public function __construct(ServiceServiceInterface $serviceService)
    {
        $this->serviceService = $serviceService;
    }


    public function index(): Response
    {
        //TODO: Lista serviços
        return Response("", 200);
    }

    public function show(): Response
    {
        //TODO: Lista 1 serviço
        return Response("", 200);
    }

    public function store(): Response
    {
        //TODO: Armazena serviço
        return Response("", 200);
    }

    public function update(): Response
    {
        //TODO Atualiza serviço
        return Response("", 200);
    }

    public function destroy(): Response
    {
        //TODO: Apaga serviço
        return Response("", 200);
    }


}
