<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OwnerController extends Controller
{

    public function __construct()
    {
        $this->class = Owner::class;
    }

    public function store(Request $request): Response
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required'
        ]);

        return parent::store($request);
    }

    public function update(Request $request, $id): Response
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required'
        ]);

        return parent::update($request, $id);
    }

}
