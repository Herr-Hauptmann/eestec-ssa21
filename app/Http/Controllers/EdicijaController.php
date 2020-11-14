<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EdicijaController extends Controller
{
    public function getEdicije()
    {
        return view('admin.edicije.lista');
    }

    public function dodajEdiciju()
    {
        return view('admin.edicije.dodavanje');
    }

    public function spasiEdiciju()
    {
        //ovdje treba implementirati da se pokupljeni podaci iz forme spase u bazu
        return view('admin.edicije.lista');
    }
}
