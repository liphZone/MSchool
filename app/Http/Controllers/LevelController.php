<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Level;
use App\Models\Year;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $niveau = Level::all();
        return view('levels.list_levels',compact('niveau'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $year = Year::where('etat',0)->get();
        return view('levels.add_level',compact('year'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insertion = Level::firstOrCreate(
        [
            'libelle'        => $request->libelle,
        ],
        [
            'nombre_classe'  => $request->nombre_classe,
            'periode'        => $request->periode,
            'montant'        => $request->montant,
            'utilisateur'    => $request->utilisateur,
            'annee_scolaire' => $request->annee_scolaire,
        ]);

        if ($insertion) {
            Flashy::success('Vous avez enregistré un niveau');
            return back();
        } else {
            Flashy::error("Echec d'enregistrement ");
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
