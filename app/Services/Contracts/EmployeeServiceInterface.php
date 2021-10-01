<?php

namespace App\Services\Contracts;

interface EmployeeServiceInterface
{
    public function getAllEmployees(): object;

    public function getEmployeeById(int $employeeId): ?object;

    public function createEmployee(array $employeeInfo): object;

    public function updateEmployee(int $employeeId, array $employeeInfo): object;

    public function destroyEmployee(int $employeeId): bool;
}
