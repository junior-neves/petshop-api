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


}
