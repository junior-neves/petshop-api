<?php

namespace App\Services;

use App\Exceptions\SpeciesNotFoundException;
use App\Repositories\Contracts\SpeciesRepositoryInterface;

class SpeciesService
{
    protected SpeciesRepositoryInterface $speciesRepository;

    public function __construct(SpeciesRepositoryInterface $speciesRepository)
    {
        $this->speciesRepository = $speciesRepository;
    }

    public function getSpeciesById(int $speciesId) : ?object
    {
        $species = $this->speciesRepository->findById($speciesId);
        if (!isset($species)) {
            throw new SpeciesNotFoundException($species);
        }

        return $species;
    }
}
