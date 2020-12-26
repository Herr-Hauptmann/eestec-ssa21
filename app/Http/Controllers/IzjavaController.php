<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Izjava;
use Illuminate\Support\Facades\DB;
use Storage;

class IzjavaController extends Controller
{
    public function getIzjave(Request $request)
    { 
        $polje = $request->input('pretraga');
        $brIzjava = 10;

        if(!empty($polje)) {
           $izjave = Izjava::where('ime', 'LIKE', "%{$polje}%")
           ->where('prezime', 'LIKE', "%{$polje}%")
           ->orwhere(DB::raw('concat(ime," ",prezime)') , 'LIKE' , "%{$polje}%")
           ->orwhere(DB::raw('concat(prezime," ",ime)') , 'LIKE' , "%{$polje}%")
           ->orderBy('updated_at', 'desc')->paginate($brIzjava);;
        } else {
            $izjave = Izjava::orderBy('updated_at', 'desc')->paginate($brIzjava);;
        }
        return view('admin.izjave.lista', ['izjave'=>$izjave]);
    }

    public function dodajIzjavu()
    {
        return view('admin.izjave.dodavanje');
    }

    public function spasiIzjavu(Request $request)

    {
        //ovdje treba implementirati da se pokupljeni podaci iz forme spase u bazu
        $validate = $request->validate([
            'imeParticipanta' => ['required', 'max:255', 'min:2'],
            'prezimeParticipanta' => ['required', 'max:255', 'min:2'],
            'izjavaParticipanta'=>['required', 'max:65535', 'min:2'],
            'slikaParticipanta' => ['image','required', 'max:1999'],
        ]);

        if($request->hasFile('slikaParticipanta')) {
            //get filename with the extension
            $filenameWithExt = $request->file('slikaParticipanta')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('slikaParticipanta')->getClientOriginalExtension();
            //creaate filename to store
            $filenameToStore= $filename.'_'.time().'.'.$extension;
            // uplad image
            $path = $request->file('slikaParticipanta')->storeAs('public/izjave', $filenameToStore);

        }else {
            $filenameToStore = "noimage.jpg";
        }


        $izjava = new Izjava();
        $izjava->ime = $request->input('imeParticipanta');
        $izjava->prezime = $request->input('prezimeParticipanta');
        $izjava->tekst = $request->input('izjavaParticipanta');
        $izjava->slika = $filenameToStore;
        $izjava->saveOrFail();

         return redirect()->route('admin.izjave.spasavanje')->with('success', 'Uspješno ste dodali novu izjavu!');
    }

    public function obrisiIzjavu($id){
        $izjava = Izjava::findOrFail($id);
        $izjava->delete();
        return redirect()->route('admin.izjave')->with('success', 'Uspješno ste obrisali izjavu!');
    }

    public function pregledajIzjavu($id){
        $izjava = Izjava::findOrFail($id);
        return view('admin.izjave.pregled', ['izjava' => $izjava]);
    }

    public function urediIzjavu($id){
        $izjava = Izjava::findOrFail($id);
        return view('admin.izjave.uredjivanje', ['izjava' => $izjava]);
    }

    public function spasiPromjene(Request $request, $id){
        $izjava = Izjava::findOrFail($id);

        $request->validate([
            'imeParticipanta' => ['required', 'max:255', 'min:2'],
            'prezimeParticipanta' => ['required', 'max:255','min:2'],
            'izjavaParticipanta'=>['required', 'max:65535', 'min:2'],
            'slikaParticipanta' => ['image','required', 'max:1999'],
        ]);

        if($request->hasFile('slikaParticipanta')) {
            //get filename with the extension
            $filenameWithExt = $request->file('slikaParticipanta')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('slikaParticipanta')->getClientOriginalExtension();
            //creaate filename to store
            $filenameToStore= $filename.'_'.time().'.'.$extension;
            // uplad image
            $path = $request->file('slikaParticipanta')->storeAs('public/izjave', $filenameToStore);

        }
        //azuriranje slike ???
        $izjava->slika = 'https://i.pinimg.com/originals/34/a6/c5/34a6c57f16c9c440dc479679c7ad2ad0.png';
        //$izjava->slika = $req->file('slikaParticipanta');


        $izjava->ime = $request->input('imeParticipanta');
        $izjava->prezime = $request->input('prezimeParticipanta');
        $izjava->tekst = $request->input('izjavaParticipanta');
        if($request->hasFile('slikaParticipanta')) {
            $old_photo=$izjava->slika;
            $izjava->slika = $filenameToStore;
            Storage::delete('public/izjave/'.$old_photo);
        }

        $izjava->saveOrFail();
        $tekstPoruke = "Uspješno ste ažurirali izjavu participanta {$izjava->ime} {$izjava->prezime}!";
        return redirect()->route('admin.izjave')->with('success', $tekstPoruke);
    }
}
