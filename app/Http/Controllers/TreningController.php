<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trening;

class TreningController extends Controller
{
    public function getTreninzi()
    {
        $treninzi = Trening::all();
        return view('admin.treninzi.lista', [
            'treninzi' => $treninzi,
        ]);
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
