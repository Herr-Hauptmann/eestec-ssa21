<?php

namespace App\Http\Controllers;

use App\Models\Novost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

        // Pretraga
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
        $slika = $request->file('slika');
        //Validacija podataka
        $request -> validate([
            'naslov' => 'required',
            'wysiwyg-editor'=> 'required',
            'slika' => 'nullable | max:1999',
            'datum' => 'required'
        ]);
        
        $novost = new Novost();
        $novost->naslov = $request->input('naslov');
        $novost->tekst = $request->input('wysiwyg-editor');
        $novost->datum = $request->input('datum');
        $novost->slika = "https://media.studomat.ba/2020/03/IMG_0087.jpg";

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
        $novost = Novost::findOrFail($id);
        
        $slika = $request->file('slika');
        
        $request -> validate(['naslov' => 'required', 
                            'wysiwyg-editor'=> 'required',
                            'slika' => 'nullable | max:1999',
                            'datum' => 'required']);

        $novost->naslov = $request->input('naslov');
        $novost->tekst = $request->input('wysiwyg-editor');
        $novost->datum = $request->input('datum');
        $novost->slika = "https://media.studomat.ba/2020/03/IMG_0087.jpg";

        $novost->saveOrFail();

        return redirect('admin/novosti')->with('flash_message', 'Uspjesno ste editovali novost!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Novost::destroy($id);
        return redirect('admin/novosti')->with('flash_message', 'Uspjesno ste izbrisali novost!');
    }
}
