<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

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
        // return $request->all();
        $request -> validate(['naziv' => 'required',
                                'link'=> 'required|url',
                                'logo' => 'image|required|max:1999']);


        //handle file upload
        if($request->hasFile('logo')) {
            //get filename with the extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('logo')->getClientOriginalExtension();
            //creaate filename to store
            $filenameToStore= $filename.'_'.time().'.'.$extension;
            // uplad image
            $path = $request->file('logo')->storeAs('public/logos', $filenameToStore);

        }else {
            $filenameToStore = "noimage.jpg";
        }


        $partner = new \App\Models\Partner;
        $partner->naziv = $request->naziv;
        $partner->link = $request->link;
        $partner->slika = $filenameToStore;

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
        $request -> validate(['naziv' => 'required',
                                'link'=> 'required|url',
                                'logo' => 'image|nullable|max:1999']);
        //handle file upload
        if($request->hasFile('logo')) {
            //get filename with the extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('logo')->getClientOriginalExtension();
            //creaate filename to store
            $filenameToStore= $filename.'_'.time().'.'.$extension;
            // uplad image
            $path = $request->file('logo')->storeAs('public/logos', $filenameToStore);

        }

        $partner = \App\Models\Partner::find($id);
        $partner->naziv = $request->naziv;
        $partner->link = $request->link;
        if($request->hasFile('logo')) {
            $old_photo=$partner->slika;
            $partner->slika = $filenameToStore;
            Storage::delete('public/logos/'.$old_photo);
        }

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
        if($partner->slika != 'noimage.jpg') {
            //delete image
            Storage::delete('public/logos/'.$partner->slika);
        }
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
