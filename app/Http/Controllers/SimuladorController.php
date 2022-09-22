<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimuladorController extends Controller
{
    public function credito()
    {
        return view('simulador.credito');
    }
}
