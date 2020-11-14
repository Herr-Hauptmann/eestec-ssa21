<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $logo = 1;
        return view('pocetna.index', compact('logo'));
    }
}
