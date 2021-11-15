<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Matiere;
use App\Models\Note;
use App\Models\Personne;
use App\Models\Year;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //je recupere les informations sur l'utilisateur connecté
        $user = Personne::where('id',auth()->user()->personne_id)->first();

        $year  = Year::where('etat',0)->first();

        //J'affiche les notes suivant les professeurs
        $eleve = Note::where('professeur',"$user->nom $user->prenom")
        ->where('annee_scolaire',"$year->annee_debut-$year->annee_fin")->get();

        return view('notes.list_notes',compact('eleve','year'));
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
        $insertion = Note::firstOrCreate(
        [
            'nom'            => strtoupper(request('nom')),
            'prenom'         => request('prenom'),
            'type'           => request('type'),
            'professeur'     => request('professeur'),
            'matiere'        => strtolower(request('matiere')),
        ],
        [
            'duree'          => request('duree'),
            'date'           => date('Y-m-d'),
            'note'           => request('note'),
            'classe'         => request('classe'),
            'annee_scolaire' => request('annee_scolaire'),
        ]);

        if ($insertion) {
            Flashy::success('Vous avez enregistré une note');
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

        #Professeur connecté
        $professeur_connected = Personne::where('id',auth()->user()->personne_id)->first();

        #ici je met recupere le prof depuis la table matiere
        $matiere = Matiere::where('professeur',"$professeur_connected->nom $professeur_connected->prenom")
        ->where('classe',$eleve->classe)->get();

        //Nbre d'interro et devoir
        $nbre = Matiere::where('libelle',request('lesson'))->where('professeur',"$professeur_connected->nom $professeur_connected->prenom")->first();
        return view('notes.add_note',compact('eleve','professeur_connected','matiere','nbre'));
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
