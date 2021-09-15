<?php

namespace App\Repositories\Contracts;

use App\Models\Species;

interface SpeciesRepositoryInterface
{
    public function findById($id): ?Species;
}
