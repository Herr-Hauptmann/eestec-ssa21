<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trener;
use Illuminate\Support\Facades\Storage;

class TrenerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $treneri = Trener::all();
        return view('admin.treneri.lista', compact('treneri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.treneri.dodavanje');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate(['ime' => 'required',
                                'prezime'=> 'required',
                                'slika' => 'image|required|max:1999']);


        //handle file upload
        if($request->hasFile('slika')) {
            //get filename with the extension
            $filenameWithExt = $request->file('slika')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('slika')->getClientOriginalExtension();
            //creaate filename to store
            $filenameToStore= $filename.'_'.time().'.'.$extension;
            // uplad image
            $path = $request->file('slika')->storeAs('public/treneri', $filenameToStore);

        }else {
            $filenameToStore = "noimage.jpg";
        }


        $trener = new Trener;
        $trener->ime = $request->ime;
        $trener->prezime = $request->prezime;
        $trener->slika = $filenameToStore;

        $trener->save();

        return redirect('admin/treneri')->with('flash_message', 'Uspjesno ste dodali novog trenera!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trener = Trener::find($id);
        return view('admin.treneri.show', compact('trener'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trener = Trener::find($id);
        return view('admin.treneri.edit', compact('trener'));
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
        $request -> validate(['ime' => 'required',
                                'prezime'=> 'required',
                                'slika' => 'image|max:1999']);


        //handle file upload
        if($request->hasFile('slika')) {
            //get filename with the extension
            $filenameWithExt = $request->file('slika')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('slika')->getClientOriginalExtension();
            //creaate filename to store
            $filenameToStore= $filename.'_'.time().'.'.$extension;
            // uplad image
            $path = $request->file('slika')->storeAs('public/treneri', $filenameToStore);

        }


        $trener = Trener::find($id);
        $trener->ime = $request->ime;
        $trener->prezime = $request->prezime;
        if($request->hasFile('slika')) {
            $old_photo=$trener->slika;
            $trener->slika = $filenameToStore;
            Storage::delete('public/treneri/'.$old_photo);
        }

        $trener->save();

        return redirect('admin/treneri')->with('flash_message', 'Uspjesno ste azurirali trenera!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trener = Trener::find($id);
        // dodati brisanje slike
        if($trener->slika != 'noimage.jpg') {
            //delete image
            Storage::delete('public/treneri/'.$trener->slika);
        }
        $trener->delete();
        // return redirect('/admin/partneri')->with('flash_message', 'Uspjesno ste izbrisali partnera!');
        return back();
    }

    public function search()
    {
        $search_text = $_GET['trener_search'];
        $treneri = Trener::where('ime'.' '.'prezime', 'LIKE', '%'.$search_text.'%')->get();

        return view('admin.treneri.lista', compact('treneri'));
    }
}
