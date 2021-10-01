<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\Contracts\EmployeeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EmployeeRepository implements EmployeeRepositoryInterface
{

    public function all(): ?Collection
    {
        // TODO: Implement all() method.
    }

    public function findById(int $employeeId): ?Employee
    {
        // TODO: Implement findById() method.
    }

    public function insert(array $employeeInfo): ?Employee
    {
        // TODO: Implement insert() method.
    }

    public function update(int $employeeId, array $employeeInfo): ?Employee
    {
        // TODO: Implement update() method.
    }

    public function delete(int $employeeId): bool
    {
        // TODO: Implement delete() method.
    }
}
