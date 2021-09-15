<?php

namespace App\Repositories;

use App\Models\Pet;
use App\Repositories\Contracts\PetRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PetRepository implements PetRepositoryInterface
{
    public function all() : ?Collection
    {
        $pets = Pet::orderBy('name')
            ->with("species")
            ->with("owner")
            ->get()
            ->makeHidden(["owner_id", "species_id"]);
        return $pets;
    }

    public function findById($id) : ?Pet
    {
        return Pet::find($id);
    }

    public function insert(array $petInfo) : ?Pet
    {
        return Pet::create($petInfo);
    }

    public function update(int $petId, array $petInfo) : ?Pet
    {
        $pet = Pet::where('id', $petId)->firstOrFail();
        $pet->update($petInfo);
        return $pet;
    }

    public function delete(int $petId) : bool
    {
        $pet = Pet::where('id', $petId)->delete();
        return $pet;
    }

}
