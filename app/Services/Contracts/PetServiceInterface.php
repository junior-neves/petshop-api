<?php

namespace App\Services\Contracts;

interface PetServiceInterface
{
    public function getAllPets(): object;

    public function getPetById(int $petId): ?object;

    public function createPet(array $petInfo): object;

    public function updatePet(int $petId, array $petInfo): object;

    public function destroyPet(int $petId): bool;
}
