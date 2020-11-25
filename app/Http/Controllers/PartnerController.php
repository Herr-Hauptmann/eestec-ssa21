<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partneri = \App\Models\Partner::all();
        return view('admin.partneri.lista', compact('partneri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategorije = \App\Models\Kategorija::all();
        $edicije = \App\Models\Edicija::all();

        return view('admin.partneri.dodavanje', compact('kategorije', 'edicije'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dodati validaciju ovdje
        $partner = new \App\Models\Partner;
        $partner->naziv = $request->naziv;
        $partner->link = $request->link;
        $partner->kategorija_id = $request->kategorija_id;
        $partner->slika = "";

        $partner->save();

        return redirect('admin/partneri')->with('flash_message', 'Uspjesno ste dodali novog organizatora!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partner = \App\Models\Partner::find($id);
        return view('admin.partneri.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = \App\Models\Partner::find($id);
        $kategorije = \App\Models\Kategorija::all();
        $edicije = \App\Models\Edicija::all();
        return view('admin.partneri.edit', compact('partner','edicije','kategorije'));
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
        $partner = \App\Models\Partner::find($id);
        $partner->naziv = $request->naziv;
        $partner->link = $request->link;
        $partner->kategorija_id = $request->kategorija_id;
        $partner->slika = "";

        $partner->save();

        return redirect('admin/partneri')->with('flash_message', 'Uspjesno ste azurirali novog organizatora!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
