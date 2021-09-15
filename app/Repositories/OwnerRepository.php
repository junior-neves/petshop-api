<?php

namespace App\Repositories;

use App\Models\Owner;
use App\Repositories\Contracts\OwnerRepositoryInterface;

class OwnerRepository implements OwnerRepositoryInterface
{

    public function findOrCreateByNameAndPhone(string $ownerName, string $ownerPhone) : ?Owner
    {
        return Owner::firstOrCreate(['name' => $ownerName, 'phone' => $ownerPhone]);
    }

}
