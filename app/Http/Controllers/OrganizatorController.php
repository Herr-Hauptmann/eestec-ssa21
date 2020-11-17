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
        $podaci = $request -> validate(['ime' => 'required | min:3', 
                                      'prezime'=> 'required | min:3',
                                      'slika' => 'nullable | image | max:1999',
                                      'telefon' => 'required | min:11 | max:12 | starts_with:+387',
                                      'mail' => 'required | email:rfc,dns']);

        //Upload slike
        $imeFajla = 'nemaSlike.jpg';
        
        $organizator = Organizator::create($podaci);
        $organizator -> save();

        return redirect('admin.organizatori');
        
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
        //
    }
}
