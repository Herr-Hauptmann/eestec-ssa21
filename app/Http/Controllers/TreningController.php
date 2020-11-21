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

    public function spasiTrening(Request $req)
    {
        $slika = $req->file('slika');
        
        $validatedData = $req->validate([
            'naziv' => ['required', 'max:255'],
            'opis' => ['required', 'max:255'],
            'slika' => ['required'],
        ]);

        // [..., 'image'] za validaciju da je file slika...

        $trening = new Trening();
        $trening->naziv = $req->input('naziv');
        $trening->opis = $req->input('opis');
        $trening->slika = "https://www.elegantthemes.com/blog/wp-content/uploads/2020/02/000-404.png";

        $trening->saveOrFail();

        return redirect()->route('admin.treninzi');
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
