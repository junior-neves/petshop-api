<?php

namespace App\Services\Contracts;

interface ServiceServiceInterface
{
    public function getAllServices(): object;

    public function getServiceById(int $serviceId): ?object;

    public function createService(array $serviceInfo): object;

    public function updateService(int $serviceId, array $serviceInfo): object;

    public function destroyService(int $serviceId): bool;
}
