<?php

namespace App\Http\Controllers;
use App\Models\Organizator;
use Illuminate\Http\Request;

class OrganizatorController extends Controller
{
    public function index()
    {
        $organizatori = Organizator::all();
        return view('admin.organizatori.index', compact('organizatori'));
    }

    public function create()
    {
        return view('admin.organizatori.create');
    }


    public function store(Request $request)
    {
        //Validacija podataka
        $request -> validate(['ime' => 'required | min:3', 
                                      'prezime'=> 'required | min:3',
                                      'slika' => 'nullable | image | max:1999',
                                      'telefon' => 'required | min:12 | max:13 | starts_with:+387',
                                      'mail' => 'required | email:rfc,dns']);

        $podaci = $request->all();
        Organizator::create($podaci);

        return redirect('admin/organizatori')->with('flash_message', 'Uspjesno ste dodali novog organizatora!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Organizator::destroy($id);
        return redirect('admin/organizatori')->with('flash_message', 'Uspjesno ste izbrisali organizatora!');
    }
}
