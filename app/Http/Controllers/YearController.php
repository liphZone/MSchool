<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year = Year::where('etat',0)->get();
        return view('years.list_years',compact('year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $year = Year::where('etat',0)->get();
        return view('years.add_year',compact('year'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insertion = Year::firstOrCreate(
        [
            'annee_debut' => request('annee_debut'),
            'annee_fin'   => request('annee_fin'),
            'etat'        => 1,
        ]);

        if ($insertion) {
            Flashy::success('Vous avez enregistré une année scolaire');
            return back();
        } else {
            Flashy::error("Echec d'enregistrement");
            return back();
        }
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
        $an   = Year::findOrFail($id);
        $year = Year::all();
        return view('years.edit_year',compact('an','year'));
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
        $year = Year::findOrFail($id);

        $annee = $request->annee;

        $new_year = Year::where('annee_debut',$annee)->where('annee_fin',$annee+1)->first();

        $maj_one = $year->update([
            'etat' => 1
        ]);

        $maj_two = $new_year->update([
            'etat' => 0
        ]);

        if ($maj_one AND $maj_two) {
            Flashy::success("Vous avez changé l'année scolaire en cours ");
            return redirect()->route('accueil');
        }
        else{
            Flashy::error('Erreur');
            return back();
        }
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
