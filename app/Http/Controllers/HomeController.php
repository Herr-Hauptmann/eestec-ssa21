<?php

namespace App\Http\Controllers;

use App\Models\Edicija;
use App\Http\Controllers\Controller;
use App\Models\Postignuce;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $edicije = Edicija::all();
        $trenutnaEdicija = Edicija::all()->last();
        return view('pocetna.index', ['edicije' => $edicije, 'trenutnaEdicija' => $trenutnaEdicija]);
    }

    public function getEdicija(Request $request)
    {
        if (request()->ajax()) {

            $model = Edicija::firstWhere('naziv', $request->naziv);
            $brojEdicija = Edicija::all()->count();
            $treninzi = $model->treninzi()->get();
            $organizatori = $model->organizatori()->get();
            $pozicije = $model->pozicije()->get();
            $postignuca = Postignuce::all();


            return response()->json(['model' => $model, 
                                    'brojEdicija' => $brojEdicija, 
                                    'treninzi' => $treninzi, 
                                    'organizatori' => $organizatori,
                                    'pozicije'=> $pozicije,
                                    'postignuca'=> $postignuca]);
        }
    }

    public function create()
    {

        return view('pocetna.ajax-request');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        #create or update your data here

        return response()->json(['poruka' => 'Ajax request submitted successfully']);
    }
}
