<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pozicija;

class PozicijaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pozicije = Pozicija::all();

        return view('admin.pozicije.lista', compact('pozicije'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pozicije.dodavanje');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate(['naziv' => 'required',
                                'opis'=> 'required']);

        $pozicija = new \App\Models\Pozicija;
        $pozicija->naziv = $request->naziv;
        $pozicija->opis = $request->opis;

        $pozicija->save();

        return redirect('admin/pozicije')->with('flash_message', 'Uspjesno ste dodali novu poziciju!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pozicija = \App\Models\Pozicija::find($id);
        return view('admin.pozicije.show', compact('pozicija'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pozicija = \App\Models\Pozicija::find($id);
        return view('admin.pozicije.edit', compact('pozicija'));
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
        $request -> validate(['naziv' => 'required',
                                'opis'=> 'required']);

        $pozicija = \App\Models\Pozicija::find($id);
        $pozicija->naziv = $request->naziv;
        $pozicija->opis = $request->opis;

        $pozicija->save();

        return redirect('admin/pozicije')->with('flash_message', 'Uspjesno ste azurirali poziciju!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pozicija = \App\Models\Pozicija::find($id);
        $pozicija->delete();
        return back();

    }

    public function search()
    {
        $search_text = $_GET['pozicija_search'];
        $pozicije = Pozicija::where('naziv', 'LIKE', '%'.$search_text.'%')->get();

        return view('admin.pozicije.lista', compact('pozicije'));
    }
}
