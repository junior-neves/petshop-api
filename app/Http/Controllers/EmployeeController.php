<?php

namespace App\Http\Controllers;

use App\Services\Contracts\EmployeeServiceInterface;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller;

class EmployeeController extends Controller
{
    private EmployeeServiceInterface $employeeService;

    public function __construct(EmployeeServiceInterface $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index(): Response
    {
        //TODO: Lista funcionarios
        return Response("", 200);
    }

    public function show(): Response
    {
        //TODO: Lista 1 funcionario
        return Response("", 200);
    }

    public function store(): Response
    {
        //TODO: Armazena funcionario
        return Response("", 200);
    }

    public function update(): Response
    {
        //TODO Atualiza funcionario
        return Response("", 200);
    }

    public function destroy(): Response
    {
        //TODO: Apaga funcionario
        return Response("", 200);
    }

    public function indexService(): Response
    {
        //TODO: Listar serviços feitos pelo funcionario
        return Response("", 200);
    }

    public function storeService(): Response
    {
        //TODO: Armazenar serviço do funcionario
        return Response("", 200);
    }

    public function destroyService(): Response
    {
        //TODO: Remover serviço do funcionário
        return Response("", 200);
    }

    public function showSchedule(): Response
    {
        //TODO: Listar horário de serviços do funcionario naquela {date}
        return Response("", 200);
    }

    public function showScheduleAvailable(): Response
    {
        //TODO: Listar hohrarios livres do funcionario para executar aquele {service} na {date}
        return Response("", 200);
    }
}
