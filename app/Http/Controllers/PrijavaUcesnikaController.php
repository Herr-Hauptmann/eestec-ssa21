<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrijavaUcesnikaController extends Controller
{
    public function getPrijave()
    {
        return view('admin.prijave.lista');
    }

    public function bodujPrijavu()
    {
        return view('admin.prijave.bodovanje');
    }

    public function spasiBodovanjePrijave()
    {
        //ovdje treba implementirati da se pokupljeni podaci iz forme spase u bazu
        return view('admin.prijave.lista');
    }


    public function getRang()
    {
        //ovdje treba implementirati da se pokupljeni podaci iz forme spase u bazu
        return view('admin.rang.lista');
    }
}
