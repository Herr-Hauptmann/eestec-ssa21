<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TreningController extends Controller
{
    public function getTreninzi()
    {
        return view('admin.treninzi.lista');
    }

    public function dodajTrening()
    {
        return view('admin.treninzi.dodavanje');
    }

    public function spasiTrening()
    {
        //ovdje treba implementirati da se pokupljeni podaci iz forme spase u bazu
        return view('admin.treninzi.lista');
    }
}
