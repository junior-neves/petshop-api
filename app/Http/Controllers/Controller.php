<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

abstract class Controller extends BaseController
{
    protected string $class;

    public function index() : Response
    {
        return Response($this->class::all(), 200);
    }


    public function store(Request $request) : Response
    {
        $owner = $this->class::create([
            'name' => $request->name,
            'phone' => $request->phone,

        ]);

        return Response($owner,200);
    }


    public function show($id) : Response
    {
        $owner = $this->class::find($id);
        if (!$owner) {
            return Response([],404);
        }

        return Response([$owner],200);
    }


    public function update(Request $request, $id) : Response
    {
        $owner = $this->class::find($id);

        if (!$owner) {
            return Response([],404);
        }

        $owner->fill($request->all());
        $owner->save();

        return Response([$owner],200);
    }


    public function destroy($id) : Response
    {
        $owner = $this->class::destroy($id);
        if (!$owner) {
            return Response([],404);
        }

        return Response([],200);
    }
}
