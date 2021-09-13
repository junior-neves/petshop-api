<?php

namespace App\Repositories;

use App\Models\Pet;
use App\Repositories\Contracts\PetRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class PetRepository implements PetRepositoryInterface
{
    public function all() : Collection
    {
        $pets = Pet::orderBy('name')
            ->with("owner")
            ->get();
        $pets->makeHidden('owner_id');
        return $pets;
    }

    public function findById($id) : ?Pet
    {
        return Pet::find($id);
    }

    public function insert(Request $request) : ?Pet
    {
        return Pet::create($request->all());
    }

    public function update(Request $request, $petId) : ?Pet
    {
        $pet = Pet::where('id', $petId)->firstOrFail();
        $pet->update($request->all());
        return $pet;
    }

    public function delete($petId) : ?int
    {
        $pet = Pet::where('id', $petId)->delete();
        return $pet;
    }

}
