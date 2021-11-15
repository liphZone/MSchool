<?php

namespace App\Http\Controllers;

use App\Http\Requests\BulletinFormRequest;
use App\Models\Bulletin;
use App\Models\Classe;
use App\Models\Inscription;
use App\Models\Moyenne;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MercurySeries\Flashy\Flashy;

class bulletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulletin = DB::select("SELECT * FROM `bulletins`ORDER BY `bulletins`.`moyenne`  DESC ");
        $year     = Year::where('etat',0)->get();
        return view('bulletins.list_bulletins',compact('bulletin','year'));
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
    public function store(BulletinFormRequest $request)
    {
        $insertion = Bulletin::firstOrCreate(
        [
            'periode'        => request('periode'),
            'term'           => request('term'),
            'nom'            => request('nom'),
            'prenom'         => request('prenom'),
            'classe'         => request('classe'),
            'niveau'         => request('niveau'),
        ],
        [
            'rang'           => null,
            'moyenne'        => request('moyenne'),
            'date'           => date('Y-m-d'),
            'utilisateur'    => auth()->user()->username,
            'annee_scolaire' => request('annee_scolaire'),
        ]);

        if ($insertion) {
            Flashy::success("Vous avez enregistré la moyenne d'un élève ");
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
        //Je recupere la periode et le term de l'eleve
        $periode = Moyenne::where('nom',$eleve->nom)->where('prenom',$eleve->prenom)->where('classe',$eleve->classe)->first();

        $somme_moyenne_matiere = Moyenne::where('nom',$eleve->nom)->where('prenom',$eleve->prenom)
        ->where('classe',$eleve->classe)->sum('avg_matiere');

        //je vais recuperer le nbre_matiere dans la table moyenne
        $nbre_matiere = Moyenne::where('nom',$eleve->nom)->where('prenom',$eleve->prenom)->where('classe',$eleve->classe)->count('matiere');

        //moyenne obtenue
        $moyenne_obtenue = number_format(($somme_moyenne_matiere/$nbre_matiere),2);

        //je vais recuperer le nbre_matiere dans la table classe
        $classe = Classe::all();
        // dd($moyenne_obtenue);


        // dd($somme_moyenne_matiere);
        return view('bulletins.add_bulletin',compact('eleve','periode','somme_moyenne_matiere','moyenne_obtenue','classe'));
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
        $eleve = Bulletin::findOrfail($id);

        $maj = $eleve->update([
            'rang' => $request->rang,
        ]);

        if ($maj) {
            Flashy::success('Mise à jour effectuée avec succès');
            return back();
        } else {
            Flashy::error("Echec");
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
