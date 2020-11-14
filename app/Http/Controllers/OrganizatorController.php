<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizatorController extends Controller
{
    public function getOrganizatori()
    {
        return view('admin.organizatori.lista');
    }

    public function dodajOrganizatora()
    {
        return view('admin.organizatori.dodavanje');
    }

    public function spasiOrganizatora()
    {
        //ovdje treba implementirati da se pokupljeni podaci iz forme spase u bazu
        return view('admin.organizatori.lista');
    }
}
