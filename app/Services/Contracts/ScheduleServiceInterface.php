<?php

namespace App\Services\Contracts;

interface ScheduleServiceInterface
{
    public function getAllSchedules(): object;

    public function getScheduleById(int $scheduleId): ?object;

    public function createSchedule(array $scheduleInfo): object;

    public function updateSchedule(int $scheduleId, array $scheduleInfo): object;

    public function destroySchedule(int $scheduleId): bool;
}
