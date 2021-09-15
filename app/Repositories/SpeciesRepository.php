<?php

namespace App\Repositories;

use App\Models\Species;
use App\Repositories\Contracts\SpeciesRepositoryInterface;

class SpeciesRepository implements SpeciesRepositoryInterface
{
    public function findById($id) : ?Species
    {
        return Species::find($id);
    }
}
