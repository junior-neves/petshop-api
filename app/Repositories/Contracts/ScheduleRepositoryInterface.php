<?php

namespace App\Repositories\Contracts;


use App\Models\Schedule;
use Illuminate\Database\Eloquent\Collection;

interface ScheduleRepositoryInterface
{
    public function all(): ?Collection;

    public function findById(int $scheduleId): ?Schedule;

    public function insert(array $scheduleInfo): ?Schedule;

    public function update(int $scheduleId, array $scheduleInfo): ?Schedule;

    public function delete(int $scheduleId): bool;
}
