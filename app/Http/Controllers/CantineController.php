<?php

namespace App\Http\Controllers;

use App\Http\Requests\CantineFormRequest;
use App\Models\Cantine;
use App\Models\Classe;
use App\Models\Inscription;
use App\Models\Year;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class CantineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classe          = Classe::all();
        $jour_montant    = Cantine::where('type', 'Journalier')->sum('montant');
        $semaine_montant = Cantine::where('type', 'Hebdomadaire')->sum('montant');
        $cantine         = Cantine::all();
        $jour            = Cantine::where('type', 'Journalier')->get();
        $semaine         = Cantine::where('type', 'Hebdomadaire')->get();
        $year            = Year::where('etat',0)->get();
        return view('cantines.list_cantines',compact('cantine','classe','jour','semaine','classe','jour_montant','semaine_montant','year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cantines.add_cantine');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CantineFormRequest $request)
    {
        $insertion = Cantine::create([
            'eleve'          => request('eleve'),
            'classe'         => request('classe'),
            'niveau'         => request('niveau'),
            'type'           => request('type'),
            'date'           => request('date'),
            'montant'        => request('montant'),
            'annee_scolaire' => request('annee_scolaire'),
        ]);

        if ($insertion) {
            Flashy::success('Vous avez enregistré un abonnement à la cantine');
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
        $data = Cantine::findOrFail($id);

        $year  = Year::where('etat',0)->get() ;

        return view('cantines.add_cantine',compact('data','year'));
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
