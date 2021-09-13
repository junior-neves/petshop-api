<?php

//TODO: Criar uma verificação se a espécie do animal está na lista de espécieis possíveis
//TODO: Validar se o id do owner que está vindo é válido

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Repositories\Contracts\PetRepositoryInterface;
use App\Repositories\PetRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller;

class PetController extends Controller
{
    private PetRepository $petRepository;

    public function __construct(PetRepositoryInterface $petRepository)
    {
        $this->petRepository = $petRepository;
    }

    public function index() : Response
    {
        $pets = $this->petRepository->all();
        return Response($pets, 200);
    }

    public function show($id) : Response
    {
        $pet = $this->petRepository->findById($id);
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

        $pet = $this->petRepository->insert($request);
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

        $pet = $this->petRepository->update($request, $id);

        return Response($pet,200);
    }

    public function destroy($id) : Response
    {
        $pet = $this->petRepository->delete($id);

        if (!$pet) {
            return Response([],404);
        }

        return Response([],200);
    }

}
