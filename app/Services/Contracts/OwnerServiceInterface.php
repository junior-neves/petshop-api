<?php

namespace App\Services\Contracts;

interface OwnerServiceInterface
{
    public function findOrCreateOwnerByNameAndPhone(string $ownerName, string $ownerPhone): ?object;
}
