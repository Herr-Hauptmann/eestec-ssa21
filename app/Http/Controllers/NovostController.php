<?php

namespace App\Http\Controllers;

use App\Models\Novost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NovostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $poStranici = 10;

        // Pretraga - search
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $novosti = Novost::
                    where('naslov', 'LIKE', "%$keyword%")
                    ->orWhere('tekst', 'LIKE', "%$keyword%")
                    ->orWhere('datum', 'LIKE', "%$keyword%")
                    ->orderBy('updated_at', 'desc')
                    ->paginate($poStranici);
        }
        // Bez pretrage - ispisi sve
        else {
            $novosti = Novost::orderBy('updated_at', 'desc')->paginate($poStranici);
        }
        return view('admin.novosti.index', compact('novosti', 'poStranici'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.novosti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validacija podataka
        $request -> validate([
            'naslov' => 'required',
            'wysiwyg-editor'=> 'required',
            'slika' => 'image|required|max:1999',
            'datum' => 'required'
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
            error_log($filenameToStore);
            $path = $request->file('slika')->storeAs('public/novosti/img', $filenameToStore);
        }
        else {
            error_log("nesto drugo");
            $filenameToStore = "noimage.jpg";
        }
        
        $novost = new Novost();
        $novost->naslov = $request->input('naslov');
        $novost->tekst = $request->input('wysiwyg-editor');
        $novost->datum = $request->input('datum');
        $novost->slika = $filenameToStore;

        $novost->saveOrFail();

        return redirect('admin/novosti')->with('flash_message', 'Uspjesno ste dodali novost!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $novost = Novost::findOrFail($id);
        return view('admin.novosti.show', [
            'novost' => $novost,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $novost = Novost::findOrFail($id);
        return view('admin.novosti.edit', [
            'novost' => $novost,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validacija podataka
        $request -> validate([
            'naslov' => 'required',
            'wysiwyg-editor'=> 'required',
            'slika' => 'image|nullable|max:1999',
            'datum' => 'required'
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
            error_log($filenameToStore);
            $path = $request->file('slika')->storeAs('public/novosti/img', $filenameToStore);
        }

        $novost = Novost::findOrFail($id);
        $novost->naslov = $request->input('naslov');
        $novost->tekst = $request->input('wysiwyg-editor');
        $novost->datum = $request->input('datum');
        if ($request->hasFile('slika')) {
            $old_photo=$novost->slika;
            $novost->slika = $filenameToStore;
            Storage::delete('public/novosti/img/'.$old_photo);
        }

        $novost->saveOrFail();

        return redirect('admin/novosti')->with('flash_message', 'Uspjesno ste azurirali novost!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $novost = Novost::findOrFail($id);
        if($novost->slika != 'noimage.jpg') {
            // Delete image
            Storage::delete('public/novosti/img/'.$novost->slika);
        }
        Novost::destroy($id);
        return redirect('admin/novosti')->with('flash_message', 'Uspjesno ste izbrisali novost!');
    }
}
