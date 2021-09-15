<?php

namespace App\Services\Contracts;

interface SpeciesServiceInterface
{
    public function getSpeciesById(int $speciesId): ?object;
}
