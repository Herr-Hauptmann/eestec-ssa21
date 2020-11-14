<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedijController extends Controller
{
    public function getMediji()
    {
        return view('admin.mediji.lista');
    }

    public function dodajMedij()
    {
        return view('admin.mediji.dodavanje');
    }

    public function spasiMedij()
    {
        //ovdje treba implementirati da se pokupljeni podaci iz forme spase u bazu
        return view('admin.mediji.lista');
    }
}
