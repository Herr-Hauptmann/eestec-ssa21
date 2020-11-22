<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medij;

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

    public function showMedij($id) {
        $medij = Medij::findOrFail($id);
        $data = [
            "medij" => $medij
        ];
        return view('admin.mediji.detalji', $data);
    }

    public function obrisiMedij($id) {
        $medij = Medij::findOrFail($id);
        $medij->delete();
        return redirect()->route('admin.mediji');

    }

    public function uredjivanje($id)
    {
        $medij = Medij::findOrFail($id);
        return view('admin.mediji.uredjivanje', [
            'medij' => $medij,
        ]);
    }

    public function spasiPromjene(Request $req, $id)
    {
        $medij = Medij::findOrFail($id);

        $slika = $req->file('slika');

        $validatedData = $req->validate([
            'naziv' => ['max:255'],
            'opis' => ['max:255'],
            'slika' => [],
        ]);

        $medij->naziv = $req->input('naziv');
        $medij->link = $req->input('link');
        $medij->slika = "https://www.elegantthemes.com/blog/wp-content/uploads/2020/02/000-404.png";

        $medij->saveOrFail();

        return redirect()->route('admin.mediji');
    }

    public function dodajMedij()
    {
        return view('admin.mediji.dodavanje');
    }

    public function spasiMedij(Request $request)
    {
        $imageUrl = "https://www.elegantthemes.com/blog/wp-content/uploads/2020/02/000-404.png";
        $item = new Medij();
        $item->naziv = $request->input("naziv");
        $item->link = $request->input('link');
        $item->slika = $imageUrl; // $request->file('slika');
        $item->saveOrFail();

        $mediji = Medij::all();
        $data = [
            "mediji" => $mediji
        ];
        return view('admin.mediji.lista', $data);
    }
}
