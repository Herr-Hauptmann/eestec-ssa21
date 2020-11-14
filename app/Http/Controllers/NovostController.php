<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NovostController extends Controller
{
    public function getNovosti()
    {
        return view('admin.novosti.lista');
    }

    public function dodajNovost()
    {
        return view('admin.novosti.dodavanje');
    }

    public function spasiNovost()
    {
        //ovdje treba implementirati da se pokupljeni podaci iz forme spase u bazu
        return view('admin.novosti.lista');
    }
}
