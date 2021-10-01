<?php

namespace App\Repositories\Contracts;


use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;

interface EmployeeRepositoryInterface
{
    public function all(): ?Collection;

    public function findById(int $employeeId): ?Employee;

    public function insert(array $employeeInfo): ?Employee;

    public function update(int $employeeId, array $employeeInfo): ?Employee;

    public function delete(int $employeeId): bool;
}
