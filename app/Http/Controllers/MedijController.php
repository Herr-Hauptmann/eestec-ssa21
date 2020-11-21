<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medij;
use App\Models\Kategorija;

class MedijController extends Controller
{
    public function getMediji()
    {
        $mediji = Medij::all();
        $data = [
            "mediji" => $mediji
        ];
        return view('admin.mediji.lista', $data);
    }

    public function dodajMedij()
    {
        $kategorije = Kategorija::all();
        $data = [
            "kategorije" => $kategorije
        ];
        return view('admin.mediji.dodavanje', $data);
    }

    public function spasiMedij()
    {
        //ovdje treba implementirati da se pokupljeni podaci iz forme spase u bazu
        return view('admin.mediji.lista');
    }
}
