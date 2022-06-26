<?php

namespace App\Http\Controllers;

use App\Models\Boite;
use Illuminate\Http\Request;

class BoiteController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('boites.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('boites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation=$request->validate([
            'numero'=> ['required','unique:boites'],
            'titre' => ['required']
        ]);

        $boite=Boite::create([
            'numero'=>$request->numero,
            'titre'=>$request->titre]);

        return redirect()->route('boites.show',['boite' => $boite->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Boite $boite)
    {

        return view('boites.show',compact(['boite']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Boite $boite)
    {


        return view('boites.create',compact(['boite']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boite $boite)
    {
        $validation=$request->validate([
            'numero'=> ['required','unique:boites,numero,'.$boite->id],
            'titre' => ['required']
        ]);

        $boite->update([
            'numero'=>$request->numero,
            'titre'=>$request->titre]);

        return redirect()->route('boites.edit',$boite);
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
