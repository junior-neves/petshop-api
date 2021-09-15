<?php

namespace App\Services;

use App\Repositories\Contracts\OwnerRepositoryInterface;
use App\Services\Contracts\OwnerServiceInterface;

class OwnerService implements OwnerServiceInterface
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
