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


}
