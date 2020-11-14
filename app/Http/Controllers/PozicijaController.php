<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PozicijaController extends Controller
{
    public function getPozicije()
    {
        return view('admin.pozicije.lista');
    }

    public function dodajPoziciju()
    {
        return view('admin.pozicije.dodavanje');
    }

    public function spasiPoziciju()
    {
        //ovdje treba implementirati da se pokupljeni podaci iz forme spase u bazu
        return view('admin.pozicije.lista');
    }
}
