<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepenseFormRequest;
use App\Models\Depense;
use App\Models\Year;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depense = Depense::all();
        return view('depenses.list_depenses',compact('depense'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $year = Year::where('etat',0)->get();
        return view('depenses.add_depense',compact('year'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepenseFormRequest $request)
    {
        $insertion = Depense::firstOrCreate(
        [
            'type'           => request('type'),
            'libelle'        => request('libelle'),
            'materiel'       => request('materiel'),
        ],
        [
            'quantite'       => request('quantite'),
            'prixunitaire'   => request('prixunitaire'),
            'montant'        => request('montant'),
            'date'           => date('Y-m-d'),
            'utilisateur'    => auth()->user()->username,
            'annee_scolaire' => request('annee_scolaire'),
        ]);

        if ($insertion) {
            Flashy::success('Vous avez enregistré une dépense');
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
