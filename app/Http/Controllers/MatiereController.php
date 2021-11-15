<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatiereFormRequest;
use App\Models\Classe;
use App\Models\Level;
use App\Models\Matiere;
use App\Models\Personne;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matiere = Matiere::all();
        $niveau = Level::all();

        //Ici je recupere le professeur connecté
        $user = Personne::where('id',auth()->user()->personne_id)->first();
        return view('matieres.list_matieres',compact('matiere','niveau'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classe = Classe::all();
        $professeur = Personne::where('statut','Professeur')->get();
        return view('matieres.add_matiere',compact('classe','professeur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatiereFormRequest $request)
    {
        $insertion = Matiere::firstOrCreate([
            'code'            => strtoupper($request->code),
            'libelle'         => strtolower($request->libelle),
            'coefficient'     => $request->coefficient,
            'professeur'      => $request->professeur,
            'classe'          => $request->classe,
        ],
        [
            'type_matiere'    => $request->type_matiere,
            'type'            => $request->type,
            'type_professeur' => $request->type_professeur,
            'nbre_interro'    => $request->nbre_interro,
            'nbre_devoir'     => $request->nbre_devoir,
        ]);

        if ($insertion) {
            Flashy::success('Vous avez enregistré une matière');
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
