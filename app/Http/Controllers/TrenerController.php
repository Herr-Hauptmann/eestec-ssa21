<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrenerController extends Controller
{
    public function getTreneri()
    {
        return view('admin.treneri.lista');
    }

    public function dodajTrenera()
    {
        return view('admin.treneri.dodavanje');
    }

    public function spasiTrenera()
    {
        //ovdje treba implementirati da se pokupljeni podaci iz forme spase u bazu
        return view('admin.treneri.lista');
    }
}
