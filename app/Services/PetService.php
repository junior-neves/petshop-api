<?php

namespace App\Services;

use App\Repositories\Contracts\PetRepositoryInterface;

class PetService
{
    protected PetRepositoryInterface $petRepository;

    public function __construct(PetRepositoryInterface $petRepository)
    {
        $this->petRepository = $petRepository;
    }

    public function getAllPets() : object
    {
        return $this->petRepository->all();
    }

    public function getPetById(int $petId) : ?object
    {
        return $this->petRepository->findById($petId);
    }

    public function createPet(array $petInfo) : object
    {
        return $this->petRepository->insert($petInfo);
    }

    public function updatePet(int $petId, array $petInfo) : object
    {
        return $this->petRepository->update($petId, $petInfo);
    }

    public function destroyPet(int $petId) : bool
    {
        return $this->petRepository->delete($petId);
    }

}
