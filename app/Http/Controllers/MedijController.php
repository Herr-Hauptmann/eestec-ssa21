<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medij;
use Illuminate\Support\Facades\Storage;

class MedijController extends Controller
{
    private $img_path = 'public/img/mediji';

    public function getMediji(Request $request)
    {
        $poStranici = 10;

        $search = $request->input('search');
        if (!empty($search)) {
            $mediji = Medij::
                    where('naziv', 'LIKE', "%$search%")
                    -> paginate($poStranici);
        } else  {
            $mediji = Medij::orderBy('updated_at', 'desc')->paginate($poStranici);
        }

        return view('admin.mediji.lista', compact('mediji', 'poStranici'));
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
        if($medij->slika != 'noimage.jpg') {
            Storage::delete($this->img_path . $medij->slika);
        }
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
        
        $validatedData = $req->validate([
            'naziv' => ['required', 'min:3', 'max:255'],
            'link' => ['required', 'min:3', 'max:255'],
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

        $medij->naziv = $req->input('naziv');
        $medij->link = $req->input('link');
        if ($req->hasFile('slika')) {
            $old_photo = $medij->slika;
            $medij->slika = $filenameToStore;
            Storage::delete($this->img_path . $old_photo);
        }

        $medij->saveOrFail();

        return redirect()->route('admin.mediji');
    }

    public function dodajMedij()
    {
        return view('admin.mediji.dodavanje');
    }

    public function spasiMedij(Request $request)
    {
        $validatedData = $request->validate([
            'naziv' => ['required', 'min:3', 'max:255'],
            'link' => ['required', 'min:3', 'max:255'],
            'slika' => ['required', 'image', 'max:1999'],
        ]);

        if ($request->hasFile('slika')) {
            // Get filename with the extension
            $filenameWithExtension = $request->file('slika')->getClientOriginalName();
            // Get just the filename
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            // Get just the extension
            $extension = $request->file('slika')->getClientOriginalExtension();
            // Create filename to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload image
            $path = $request->file('slika')->storeAs($this->img_path, $filenameToStore);
        } else {
            $filenameToStore = "noimage.jpg";
        }

        $medij = new Medij();
        $medij->naziv = $request->input('naziv');
        $medij->link = $request->input('link');
        $medij->slika = $filenameToStore;

        $medij->saveOrFail();

        return redirect()->route('admin.mediji');
    }
}
