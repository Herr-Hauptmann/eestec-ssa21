<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prijava;
use App\Models\Edicija;
use Illuminate\Support\Facades\DB;


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


    public function getRang(Request $request)
    {
        if (request()->ajax()) {

            $rangLista = Prijava::orderBy('ukupniBodovi', 'desc')->orderBy('zvjezdica', 'asc')
            ->where('idEdicije','=', $request->idEdicije);
            
            return response()->json(['lista' => $rangLista
                                    ]);
        }

        $polje = $request->input('pretraga');
        $brKandidata = 10;
        
        $edicije = Edicija::orderBy('datum_pocetka', 'desc')->get();
        $najnovijaEdicija = Edicija::orderBy('datum_pocetka', 'desc')->first();
       
        if(!empty($polje)) {
            $rang = Prijava::orderBy('ukupniBodovi', 'desc')->orderBy('zvjezdica', 'asc')
            ->where('idEdicije','=',$najnovijaEdicija->id)
            ->where(function($query)use ($polje){
                return $query
                ->where('ime', 'LIKE', "%{$polje}%")
                ->orwhere('prezime', 'LIKE', "%{$polje}%")
                ->orwhere(DB::raw('concat(ime," ",prezime)') , 'LIKE' , "%{$polje}%")
                ->orwhere(DB::raw('concat(prezime," ",ime)') , 'LIKE' , "%{$polje}%");}
                )->paginate($brKandidata);
            
        } else {
            $rang=Prijava::orderBy('ukupniBodovi', 'desc')->orderBy('zvjezdica', 'asc')
            ->where('idEdicije','=',$najnovijaEdicija->id)->paginate($brKandidata);
        }
        
        return view('admin.rang.lista', ['rang'=>$rang, 'edicije'=>$edicije, 'selektovan'=>$najnovijaEdicija->id]);
    }    
}
