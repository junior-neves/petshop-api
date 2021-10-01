<?php

namespace App\Http\Controllers;

use App\Services\Contracts\ScheduleServiceInterface;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller;

class ScheduleController extends Controller
{
    private ScheduleServiceInterface $scheduleService;

    public function __construct(ScheduleServiceInterface $scheduleService)
    {
        $this->scheduleService = $scheduleService;
    }


    public function index(): Response
    {
        //TODO: Lista agendamentos
        return Response("", 200);
    }

    public function show(): Response
    {
        //TODO: Lista 1 agendamento
        return Response("", 200);
    }

    public function store(): Response
    {
        //TODO: Armazena agendamento
        return Response("", 200);
    }

    public function update(): Response
    {
        //TODO Atualiza agendamento
        return Response("", 200);
    }

    public function destroy(): Response
    {
        //TODO: Apaga agendamento
        return Response("", 200);
    }


}
