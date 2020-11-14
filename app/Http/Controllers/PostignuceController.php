<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostignuceController extends Controller
{
    public function getPostignuca()
    {
        return view('admin.postignuca.lista');
    }

    public function dodajPostignuce()
    {
        return view('admin.postignuca.dodavanje');
    }

    public function spasiPostignuce()
    {
        //ovdje treba implementirati da se pokupljeni podaci iz forme spase u bazu
        return view('admin.postignuca.lista');
    }
}
