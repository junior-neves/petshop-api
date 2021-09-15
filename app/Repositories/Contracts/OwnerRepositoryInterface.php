<?php

namespace App\Repositories\Contracts;

use App\Models\Owner;

interface OwnerRepositoryInterface
{
    public function findOrCreateByNameAndPhone(string $ownerName, string $ownerPhone): ?Owner;
}
