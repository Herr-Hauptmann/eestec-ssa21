<?php

namespace App\Http\Controllers;
use App\Models\Organizator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrganizatorController extends Controller
{
    public function index(Request $request)
    {
        $poStranici = 15;
        $keyword = $request->get('search');
        
        if (!empty($keyword)) {
            $organizatori = Organizator::
                    where('ime', 'LIKE', "%$keyword%")
                    ->orWhere('prezime', 'LIKE', "%$keyword%")
                    ->orWhere('mail', 'LIKE', "%$keyword%")
                    ->orderBy('updated_at', 'desc')
                    -> paginate($poStranici);
        }
        else 
        {
            $organizatori = Organizator::orderBy('updated_at', 'desc')->paginate($poStranici);
        }
        return view('admin.organizatori.index', compact('organizatori', 'poStranici'));
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

    public function show($id)
    {
        $organizator = Organizator::where('id', $id)->firstOrFail();
        return view('admin.organizatori.show', compact('organizator'));
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
