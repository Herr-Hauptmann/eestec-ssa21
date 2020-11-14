<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IzjavaController extends Controller
{
    public function getIzjave()
    {
        return view('admin.izjave.lista');
    }

    public function dodajIzjavu()
    {
        return view('admin.izjave.dodavanje');
    }

    public function spasiIzjavu()
    {
        //ovdje treba implementirati da se pokupljeni podaci iz forme spase u bazu
        return view('admin.izjave.lista');
    }
}
