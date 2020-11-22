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
