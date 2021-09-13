<?php

namespace App\Repositories\Contracts;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface PetRepositoryInterface
{
    public function all(): Collection;

    public function findById($id): ?Pet;

    public function insert(Request $request): ?Pet;

    public function update(Request $request, $petId): ?Pet;

    public function delete($petId): ?int;
}
