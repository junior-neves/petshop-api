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

}
