<?php

//TODO: Criar uma verificação se a espécie do animal está na lista de espécieis possíveis
//TODO: Validar se o id do owner que está vindo é válido

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PetController extends Controller
{

    public function __construct()
    {
        $this->class = Pet::class;
    }


    public function index() : Response
    {
        $pets = Pet::orderBy('name')
            ->with("owner")
            ->get();
        $pets->makeHidden('owner_id');
        return Response($pets, 200);
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

        return parent::store($request);
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

        return parent::update($request, $id);
    }

}
