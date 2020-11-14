<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategorijaController extends Controller
{
    public function getKategorije()
    {
        return view('admin.kategorije.lista');
    }

    public function dodajKategoriju()
    {
        return view('admin.kategorije.dodavanje');
    }

    public function spasiKategoriju()
    {
        //ovdje treba implementirati da se pokupljeni podaci iz forme spase u bazu
        return view('admin.kategorije.lista');
    }
}
