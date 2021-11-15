<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Matiere;
use App\Models\Warning;
use App\Models\Year;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class WarningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absence = Warning::where('type','Absence')->get();
        $retard  = Warning::where('type','Retard')->get();
        $year    = Year::where('etat',0)->get();
        return view('warnings.list_warnings',compact('absence','retard','year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insertion = Warning::create(
        [
            'nom'            => request('nom'),
            'prenom'         => request('prenom'),
            'classe'         => request('classe'),
            'professeur'     => request('professeur'),
            'matiere'        => request('matiere'),
            'date'           => request('date'),
            'type'           => request('type'),
            'motif'          => request('motif'),
            'annee_scolaire' => request('annee_scolaire'),
        ]);

        if ($insertion) {
            Flashy::success('Vous avez enregistré réussi');
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
        $eleve = Inscription::findOrFail($id);
        $professeur = Matiere::where('classe',$eleve->classe)->first();
        return view('warnings.add_warning',compact('eleve','professeur'));
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
