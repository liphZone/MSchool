<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Matiere;
use App\Models\Moyenne;
use App\Models\Note;
use App\Models\Personne;
use App\Models\Year;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class MoyenneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moyenne = Moyenne::all();
        $year    = Year::where('etat',0)->get();
        return view('moyennes.list_moyennes',compact('moyenne','year'));
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
        $insertion = Moyenne::firstOrCreate(
        [
            'nom'              => request('nom'),
            'prenom'           => request('prenom'),
            'classe'           => request('classe'),
            'matiere'          => strtolower(request('matiere')),
            'type_matiere'     => request('type_matiere'),
        ],
        [
            'periode'          => request('periode'),
            'term'             => request('term'),
            'professeur'       => request('professeur'),
            'interrogation'    => request('interrogation'),
            'devoir'           => request('devoir'),
            'examen'           => request('examen'),
            'coefficient'      => request('coefficient'),
            'avg_matiere'      => number_format(request('avg_matiere'),2),
            'avg_matiere_coef' => number_format(request('avg_matiere_coef'),2),
            'appreciation'     => request('appreciation'),
            'date'             => request('date'),
            'utilisateur'      => request('utilisateur'),
            'annee_scolaire'   => request('annee_scolaire'),
        ]);

        if ($insertion) {
            Flashy::success("Vous avez enregistré la moyenne d'une matière");
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
        //Je selectionne la matiere
        $eleve = Inscription::findOrFail($id);
        $year = Year::where('etat',0)->get();

        $user = Personne::where('id',auth()->user()->personne_id)->first();

        //$matiere contien les informations sur la matiere du prof connecté
        $matiere = Matiere::where('professeur',"$user->nom $user->prenom")->get();

        $type_matiere = Matiere::where('libelle',request('lesson'))->first();

        //Nombre d'interro et de devoir
        $nbre = Matiere::where('libelle',request('lesson'))
        ->where('professeur',"$user->nom $user->prenom")->first();

        //Note Interro 1
        $note_interro_one = Note::where('type','Interro_one')
        ->where('nom',$eleve->nom)->where('prenom',$eleve->prenom)->where('matiere',request('lesson'))->first();
        //Note Interro 2
        $note_interro_two = Note::where('type','Interro_two')
        ->where('nom',$eleve->nom)->where('prenom',$eleve->prenom)->where('matiere',request('lesson'))->first();
        //Note Interro 3
        $note_interro_three = Note::where('type','Interro_three')
        ->where('nom',$eleve->nom)->where('prenom',$eleve->prenom)->where('matiere',request('lesson'))->first();

        //Note Devoir 1
        $note_devoir_one = Note::where('type','Devoir_one')
        ->where('nom',$eleve->nom)->where('prenom',$eleve->prenom)->where('matiere',request('lesson'))->first();
        //Note Devoir 2
        $note_devoir_two = Note::where('type','Devoir_two')
        ->where('nom',$eleve->nom)->where('prenom',$eleve->prenom)->where('matiere',request('lesson'))->first();

        //Note Examen
        $note_examen = Note::where('type','Examen')
        ->where('nom',$eleve->nom)->where('prenom',$eleve->prenom)->where('matiere',request('lesson'))->first();

        return view('moyennes.add_moyenne',compact('eleve','user','matiere','type_matiere','nbre','note_interro_one','note_interro_two',
        'note_interro_three','note_devoir_one','note_devoir_two','note_examen'));
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
