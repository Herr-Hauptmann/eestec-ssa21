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

    public function showTrening($id)
    {
        $trening = Trening::findOrFail($id);
        return view('admin.treninzi.detalji', [
            'trening' => $trening,
        ]);
    }

    public function obrisiTrening($id)
    {
        $trening = Trening::findOrFail($id);
        $trening->delete();
        return redirect()->route('admin.treninzi');
    }
}
