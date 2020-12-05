<?php

namespace App\Http\Controllers;

use App\Models\Edicija;
use App\Models\Kategorija;
use App\Models\Medij;
use App\Models\Organizator;
use App\Models\Partner;
use App\Models\Pozicija;
use App\Models\Trener;
use App\Models\Trening;
use Illuminate\Http\Request;

use function PHPUnit\Framework\matches;

// use illuminate\Validation\Validator

class EdicijaController extends Controller
{

    private const STORE_OR_UPDATE_VALIDATION_RULES = [
        'naziv'                     => 'required',
        // 'ssa_tip'                   => 'required',
        'broj_ucesnika'             => 'required|min:0|max:200',
        'datum_pocetka'             => 'required|exclude_if:unos_stare,on|after:today',
        'datum_kraja'               => 'required|after_or_equal:datum_pocetka',
        'mjesto_odrzavanja'         => 'required',
        'datum_otvaranja_prijava'   => 'exclude_if:unos_stare,on|required|before:datum_pocetka',
        'datum_zatvaranja_prijava'  => 'exclude_if:unos_stare,on|required|after:datum_otvaranja_prijava|before:datum_pocetka',
        'organizator_id.*'          => 'required_if_array:pozicija_id,1',
        'pozicija_id.*'             => 'required_if_array:organizator_id,1',
        'trener_id.*'               => 'required_if_array:trening_id,1',
        'trening_id.*'              => 'required_if_array:trener_id,1',
        'partner_id.*'              => 'required_if_array:partner_kategorija_id,1',
        'partner_kategorija_id.*'   => 'required_if_array:partner_id,1',
        'medij_id.*'                => 'required_if_array:medij_kategorija_id,1',
        'medij_kategorija_id.*'     => 'required_if_array:medij_id,1',
    ];


    /**
     * Display a listing of the editions.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $editions = Edicija::where('naziv', 'LIKE', "%$keyword%")
                ->orderBy('datum_pocetka', 'DESC')
                ->paginate($perPage);
        }
        else {
            $editions = Edicija::orderBy('datum_pocetka', 'DESC')
                ->paginate($perPage);
        }

        return view('admin.edicije.index', compact('editions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $organizers     = Organizator::orderBy('ime')->get();
        $positions      = Pozicija::orderBy('naziv')->get();
        $trainers       = Trener::orderBy('ime')->get();
        $trainings      = Trening::orderBy('created_at', 'DESC')->get();
        $partners       = Partner::orderBy('naziv')->get();
        $categories     = Kategorija::orderBy('naziv')->get();
        $mediums        = Medij::orderBy('naziv')->get();
        
        return view('admin.edicije.create', compact('organizers', 'positions', 'trainers', 'trainings', 'partners', 'categories', 'mediums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // return response()->json($request);
        $request->validate(self::STORE_OR_UPDATE_VALIDATION_RULES);

        $edition = Edicija::create($request->all() + ['logo' => '/img/logo1.png']);
        
        // Kreiranje veza u pivot tabeli za organizatore i pozicije
        $organizator_pozicija = [];

        foreach($request->organizator_id as $index => $org_id) 
        {
            $organizator_pozicija[$org_id] = ['pozicija_id' => $request->pozicija_id[$index]];
        }

        $edition->organizatori()->sync($organizator_pozicija);

        // Kreiranje veza u pivot tabeli za trenere i treninge

        $trener_trening = [];

        foreach($request->trener_id as $index => $trener_id) 
        {
            $trener_trening[$trener_id] = ['trening_id' => $request->trening_id[$index]];
        }

        $edition->treneri()->sync($trener_trening);

        // Kreiranje veza u pivot tabeli za partnere i kategorije

        $partner_kategorija = [];

        foreach($request->partner_id as $index => $partner_id) 
        {
            $partner_kategorija[$partner_id] = ['kategorija_id' => $request->partner_kategorija_id[$index]];
        }

        $edition->partneri()->sync($partner_kategorija);

        // Kreiranje veza u pivot tabeli za medije i kategorije

        $medij_kategorija = [];

        foreach($request->medij_id as $index => $medij_id) 
        {
            $medij_kategorija[$medij_id] = ['kategorija_id' => $request->medij_kategorija_id[$index]];
        }

        $edition->mediji()->sync($medij_kategorija);

        // return response()->json($request->all() + $organizator_pozicija);

        return redirect()->route('admin.editions')->with('success', 'Edicija uspješno kreirana!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Edicija  $edition
     * @return \Illuminate\Http\Response
     */
    public function show(Edicija $edition)
    {
        return view('admin.edicije.show', compact('edition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Edicija  $edition
     * @return \Illuminate\Http\Response
     */
    public function edit(Edicija $edition)
    {
        $organizers     = Organizator::orderBy('ime')->get();
        $positions      = Pozicija::orderBy('naziv')->get();
        $trainers       = Trener::orderBy('ime')->get();
        $trainings      = Trening::orderBy('created_at', 'DESC')->get();
        $partners       = Partner::orderBy('naziv')->get();
        $categories     = Kategorija::orderBy('naziv')->get();
        $mediums        = Medij::orderBy('naziv')->get();
        
        return view('admin.edicije.edit', compact('edition', 'organizers', 'positions', 'trainers', 'trainings', 'partners', 'categories', 'mediums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Edicija  $edition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Edicija $edition)
    {
        $request->validate(self::STORE_OR_UPDATE_VALIDATION_RULES);

        $edition->update($request->all());
        
        // Kreiranje veza u pivot tabeli za organizatore i pozicije
        $organizator_pozicija = [];

        foreach($request->organizator_id as $index => $org_id) 
        {
            $organizator_pozicija[$org_id] = ['pozicija_id' => $request->pozicija_id[$index]];
        }

        $edition->organizatori()->sync($organizator_pozicija);

        // Kreiranje veza u pivot tabeli za trenere i treninge

        $trener_trening = [];

        foreach($request->trener_id as $index => $trener_id) 
        {
            $trener_trening[$trener_id] = ['trening_id' => $request->trening_id[$index]];
        }

        $edition->treneri()->sync($trener_trening);

        // Kreiranje veza u pivot tabeli za partnere i kategorije

        $partner_kategorija = [];

        foreach($request->partner_id as $index => $partner_id) 
        {
            $partner_kategorija[$partner_id] = ['kategorija_id' => $request->partner_kategorija_id[$index]];
        }

        $edition->partneri()->sync($partner_kategorija);

        // Kreiranje veza u pivot tabeli za medije i kategorije

        $medij_kategorija = [];

        foreach($request->medij_id as $index => $medij_id) 
        {
            $medij_kategorija[$medij_id] = ['kategorija_id' => $request->medij_kategorija_id[$index]];
        }

        $edition->mediji()->sync($medij_kategorija);

        // return response()->json($request->all() + $organizator_pozicija);
        return redirect()->route('admin.editions')->with('success', 'Edicija uspješno izmjenjena!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Edicija  $edition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edicija $edition)
    {
        $edition->delete();

        return redirect()->route('admin.editions')->with('flash_message', 'Edicija uspjesno izbrisana!');
    }
}
