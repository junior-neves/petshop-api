<?php

namespace App\Repositories\Contracts;


use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;

interface ServiceRepositoryInterface
{
    public function all(): ?Collection;

    public function findById(int $serviceId): ?Service;

    public function insert(array $serviceInfo): ?Service;

    public function update(int $serviceId, array $serviceInfo): ?Service;

    public function delete(int $serviceId): bool;
}
