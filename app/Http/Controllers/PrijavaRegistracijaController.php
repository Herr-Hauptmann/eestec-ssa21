<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrijavaRegistracijaController extends Controller
{
    public function prijava()
    {
        return view('prijava/prijava');
    }

    public function registracija()
    {
        return view('prijava/registracija');
    }
}
