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


}
