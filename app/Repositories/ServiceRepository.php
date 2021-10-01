<?php

namespace App\Repositories;

use App\Models\Service;
use App\Repositories\Contracts\ServiceRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ServiceRepository implements ServiceRepositoryInterface
{

    public function all(): ?Collection
    {
        // TODO: Implement all() method.
    }

    public function findById(int $serviceId): ?Service
    {
        // TODO: Implement findById() method.
    }

    public function insert(array $serviceInfo): ?Service
    {
        // TODO: Implement insert() method.
    }

    public function update(int $serviceId, array $serviceInfo): ?Service
    {
        // TODO: Implement update() method.
    }

    public function delete(int $serviceId): bool
    {
        // TODO: Implement delete() method.
    }
}
