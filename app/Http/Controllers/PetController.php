<?php

//TODO: Criar uma verificação se a espécie do animal está na lista de espécieis possíveis

namespace App\Http\Controllers;

use App\Http\Requests\PetRequest;
use App\Services\PetService;
use App\Services\OwnerService;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller;

class PetController extends Controller
{
    private PetService $petService;
    private OwnerService $ownerService;

    public function __construct(PetService $petService, OwnerService $ownerService)
    {
        $this->petService = $petService;
        $this->ownerService = $ownerService;
    }

    public function index() : Response
    {
        $pets = $this->petService->getAllPets();
        return Response($pets, 200);
    }

    public function show($id) : Response
    {
        $pet = $this->petService->getPetById($id);
        if (!$pet) {
            return Response([],404);
        }

        return Response($pet,200);
    }

    public function store(PetRequest $request): Response
    {
        $owner = $this->ownerService->findOrCreateOwnerByNameAndPhone($request->owner_name, $request->owner_phone);
        $request->merge(["owner_id" => $owner->id]);

        $pet = $this->petService->createPet($request->all());

        return Response($pet,200);
    }

    public function update(PetRequest $request, $id): Response
    {
        $owner = $this->ownerService->findOrCreateOwnerByNameAndPhone($request->owner_name, $request->owner_phone);
        $request->merge(["owner_id" => $owner->id]);

        $pet = $this->petService->updatePet($id, $request->all());

        return Response($pet,200);
    }

    public function destroy($id) : Response
    {
        $pet = $this->petService->destroyPet($id);

        if (!$pet) {
            return Response([],404);
        }

        return Response([],200);
    }

}
