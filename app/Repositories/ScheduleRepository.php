<?php

namespace App\Repositories;

use App\Models\Schedule;
use App\Repositories\Contracts\ScheduleRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ScheduleRepository implements ScheduleRepositoryInterface
{

    public function all(): ?Collection
    {
        // TODO: Implement all() method.
    }

    public function findById(int $scheduleId): ?Schedule
    {
        // TODO: Implement findById() method.
    }

    public function insert(array $scheduleInfo): ?Schedule
    {
        // TODO: Implement insert() method.
    }

    public function update(int $scheduleId, array $scheduleInfo): ?Schedule
    {
        // TODO: Implement update() method.
    }

    public function delete(int $scheduleId): bool
    {
        // TODO: Implement delete() method.
    }
}
