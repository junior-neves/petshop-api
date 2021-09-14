<?php

//TODO: Criar uma verificação se a espécie do animal está na lista de espécieis possíveis
//TODO: Validar se o id do owner que está vindo é válido

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Repositories\Contracts\PetRepositoryInterface;
use App\Services\PetService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller;

class PetController extends Controller
{
    private PetService $petService;

    public function __construct(PetService $petService)
    {
        $this->petService = $petService;
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

    public function store(Request $request): Response
    {
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required|integer',
            'species' => 'required|integer',
            'breed' => 'required',
            'owner_id' => 'required|integer',
        ]);

        $pet = $this->petService->createPet($request->all());
        return Response($pet,200);
    }

    public function update(Request $request, $id): Response
    {
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
            'species' => 'required',
            'breed' => 'required',
            'owner_id' => 'required',
        ]);

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
