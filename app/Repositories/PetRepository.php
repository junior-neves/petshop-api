<?php

namespace App\Repositories;

use App\Models\Pet;
use App\Repositories\Contracts\PetRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PetRepository implements PetRepositoryInterface
{
    public function all(): ?Collection
    {
        $pets = Pet::orderBy('name')
            ->with("species")
            ->with("owner")
            ->get()
            ->makeHidden(["owner_id", "species_id"]);
        return $pets;
    }

    public function findById($id): ?Pet
    {
        $pet = Pet::find($id);
        if ($pet) {
            $pet->load("owner")
                ->load("species")
                ->makeHidden(["owner_id", "species_id"]);
        }

        return $pet;
    }

    public function insert(array $petInfo): ?Pet
    {
        return Pet::create($petInfo)->load('owner')->load('species')->makeHidden(["owner_id", "species_id"])->refresh();
    }

    public function update(int $petId, array $petInfo): ?Pet
    {
        $pet = Pet::where('id', $petId)->firstOrFail();
        $pet->update($petInfo);
        $pet->load("owner")
            ->load("species")
            ->makeHidden(["owner_id", "species_id"]);

        return $pet;
    }

    public function delete(int $petId): bool
    {
        return Pet::where('id', $petId)->delete();
    }
}
