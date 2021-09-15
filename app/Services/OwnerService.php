<?php

namespace App\Services;

use App\Repositories\Contracts\OwnerRepositoryInterface;

class OwnerService
{
    protected OwnerRepositoryInterface $ownerRepository;

    public function __construct(OwnerRepositoryInterface $ownerRepository)
    {
        $this->ownerRepository = $ownerRepository;
    }

    public function findOrCreateOwnerByNameAndPhone(string $ownerName, string $ownerPhone) : ?object
    {
        return $this->ownerRepository->findOrCreateByNameAndPhone($ownerName, $ownerPhone);
    }


}
