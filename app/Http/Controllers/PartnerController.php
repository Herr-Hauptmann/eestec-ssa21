<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function getPartneri()
    {
        return view('admin.partneri.lista');
    }

    public function dodajPartnera()
    {
        return view('admin.partneri.dodavanje');
    }

    public function spasiPartnera()
    {
        //ovdje treba implementirati da se pokupljeni podaci iz forme spase u bazu
        return view('admin.partneri.lista');
    }
}
