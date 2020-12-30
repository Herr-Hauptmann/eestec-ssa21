<?php

namespace App\Http\Controllers;
use App\Models\Organizator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
$poStranici = 10;
class OrganizatorController extends Controller
{
    
    public function index(Request $request)
    {
        $poStranici = $request->get('paginacija');

        //Pretraga
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $organizatori = Organizator::
                    where('ime', 'LIKE', "%$keyword%")
                    ->orWhere('prezime', 'LIKE', "%$keyword%")
                    ->orWhere('mail', 'LIKE', "%$keyword%")
                    ->orderBy('updated_at', 'desc')
                    -> paginate($poStranici);
        }
        //Bez pretrage - ispisi sve
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
        $request -> validate(['ime' => 'required | min:3 | max:255', 
                                      'prezime'=> 'required | min:3 | max:255',
                                      'slika' => 'nullable | image | max:1999',
                                      'telefon' => 'required | min:12 | max:13 | starts_with:+387 | max:255',
                                      'mail' => 'required | email:rfc,dns | max:255']);

        $podaci = $request->all();
        Organizator::create($podaci);

        return redirect('admin/organizatori')->with('flash_message', 'Uspjesno ste dodali novog organizatora!');
    }

    public function show($id)
    {
        $organizator = Organizator::where('id', $id)->firstOrFail();
        return view('admin.organizatori.show', compact('organizator'));
    }

    public function edit($id)
    {
        $organizator = Organizator::where('id', $id)->firstOrFail();
        return view('admin.organizatori.edit', compact('organizator'));
    }
    public function update(Request $request, $id)
    {
        $organizator = Organizator::where('id', $id)->firstOrFail();
        $request -> validate(['ime' => 'required | min:3', 
                                      'prezime'=> 'required | min:3',
                                      'slika' => 'nullable | image | max:1999',
                                      'telefon' => 'required | min:12 | max:13 | starts_with:+387',
                                      'mail' => 'required | email:rfc,dns']);
        $podaci = $request->all();
        $organizator->update($podaci);
        return redirect('admin/organizatori')->with('flash_message', 'Uspjesno ste uredili organizatora!');
    }

    public function destroy($id)
    {
        Organizator::destroy($id);
        return redirect('admin/organizatori')->with('flash_message', 'Uspjesno ste izbrisali organizatora!');
    }
}
