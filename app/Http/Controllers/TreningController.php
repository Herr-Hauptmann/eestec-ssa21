<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trening;
use Illuminate\Support\Facades\Storage;

class TreningController extends Controller
{
    private $img_path = 'public/img/treninzi';

    public function getTreninzi(Request $req)
    {
        $poStranici = 10;

        $search = $req->input('search');
        if (!empty($search)) {
            $treninzi = Trening::
                    where('naziv', 'LIKE', "%$search%")
                    ->orWhere('opis', 'LIKE', "%$search%")
                    -> paginate($poStranici);
        } else  {
            $treninzi = Trening::orderBy('updated_at', 'desc')->paginate($poStranici);
        }

        return view('admin.treninzi.lista', compact('treninzi', 'poStranici'));
    }

    public function dodajTrening()
    {
        return view('admin.treninzi.dodavanje');
    }

    public function spasiTrening(Request $req)
    {
        $validatedData = $req->validate([
            'naziv' => ['required', 'min:3', 'max:255'],
            'opis' => ['required', 'min:3'],
            'slika' => ['required', 'image', 'max:1999'],
        ]);

        if ($req->hasFile('slika')) {
            // Get filename with the extension
            $filenameWithExtension = $req->file('slika')->getClientOriginalName();
            // Get just the filename
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            // Get just the extension
            $extension = $req->file('slika')->getClientOriginalExtension();
            // Create filename to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload image
            $path = $req->file('slika')->storeAs($this->img_path, $filenameToStore);
        } else {
            $filenameToStore = "noimage.jpg";
        }

        $trening = new Trening();
        $trening->naziv = $req->input('naziv');
        $trening->opis = $req->input('opis');
        $trening->slika = $filenameToStore;

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
        if($trening->slika != 'noimage.jpg') {
            Storage::delete($this->img_path . $trening->slika);
        }
        $trening->delete();
        return redirect()->route('admin.treninzi');
    }

    public function uredjivanje($id)
    {
        $trening = Trening::findOrFail($id);
        return view('admin.treninzi.uredjivanje', [
            'trening' => $trening,
        ]);
    }

    public function spasiPromjene(Request $req, $id)
    {
        $trening = Trening::findOrFail($id);
        
        $validatedData = $req->validate([
            'naziv' => ['required', 'min:3', 'max:255'],
            'opis' => ['required', 'min:3'],
            'slika' => ['nullable', 'image', 'max:1999'],
        ]);

        if ($req->hasFile('slika')) {
            // Get filename with the extension
            $filenameWithExtension = $req->file('slika')->getClientOriginalName();
            // Get just the filename
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            // Get just the extension
            $extension = $req->file('slika')->getClientOriginalExtension();
            // Create filename to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload image
            $path = $req->file('slika')->storeAs($this->img_path, $filenameToStore);
        }

        $trening->naziv = $req->input('naziv');
        $trening->opis = $req->input('opis');
        if ($req->hasFile('slika')) {
            $old_photo = $trening->slika;
            $trening->slika = $filenameToStore;
            Storage::delete($this->img_path . $old_photo);
        }

        $trening->saveOrFail();

        return redirect()->route('admin.treninzi');
    }
}
