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
    public function index()
    {
        return view('admin.edicije.lista');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.edicije.dodavanje');
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
        return view('admin.edicije.lista');
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
