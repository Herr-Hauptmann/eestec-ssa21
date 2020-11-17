<?php

namespace App\Http\Controllers;

use App\Models\Edicija;
use Illuminate\Http\Request;

class EdicijaController extends Controller
{
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
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orderBy('DESC')
                ->paginate($perPage);
        } else {
            $editions = Edicija::paginate($perPage);
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
        return view('admin.edicije.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ovdje treba implementirati da se pokupljeni podaci iz forme spase u bazu
        return view('admin.edicije.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Edicija  $edition
     * @return \Illuminate\Http\Response
     */
    public function show(Edicija $edition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Edicija  $edition
     * @return \Illuminate\Http\Response
     */
    public function edit(Edicija $edition)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Edicija  $edition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edicija $edition)
    {
        //
    }
}
