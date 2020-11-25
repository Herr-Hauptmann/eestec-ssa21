<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

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
        return view('admin.partneri.dodavanje');
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
        $partner->slika = "";

        $partner->save();

        return redirect('admin/partneri')->with('flash_message', 'Uspjesno ste dodali novog partnera!');
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
        return view('admin.partneri.edit', compact('partner'));
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
        $partner->slika = "";

        $partner->save();

        return redirect('admin/partneri')->with('flash_message', 'Uspjesno ste azurirali partnera!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = \App\Models\Partner::find($id);
        // dodati brisanje slike
        $partner->delete();
        // return redirect('/admin/partneri')->with('flash_message', 'Uspjesno ste izbrisali partnera!');
        return back();
    }

    /**
     * Filters list of partners nased on 'naziv'
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $search_text = $_GET['partner_search'];
        $partneri = Partner::where('naziv', 'LIKE', '%'.$search_text.'%')->get();

        return view('admin.partneri.lista', compact('partneri'));
    }

}
