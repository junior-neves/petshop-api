<?php

namespace App\Repositories\Contracts;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Collection;

interface PetRepositoryInterface
{
    public function all(): ?Collection;

    public function findById(int $petId): ?Pet;

    public function insert(array $petInfo): ?Pet;

    public function update(int $petId, array $petInfo): ?Pet;

    public function delete(int $petId): bool;
}
