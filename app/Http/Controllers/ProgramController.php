<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Matiere;
use App\Models\Personne;
use App\Models\Program;
use App\Models\Year;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year       = Year::where('etat',0)->first();
        $classe     = Classe::all();
        $professeur = Personne::where('statut','Professeur')->get();
        $matiere    = Matiere::all();
        $timetable  = Program::where('annee_scolaire',"$year->annee_debut-$year->annee_fin")->get();
        return view('programs.list_programs',compact('year','classe','professeur','matiere','timetable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $classe     = Classe::all();
        // $matiere    = Matiere::where('classe',request('classroom'))->get();
        // $year       = Year::where('etat',0)->get();
        // return view('programs.add_program',compact('classe','matiere','year'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insertion = Program::firstOrCreate(
            [
                'classe'         => request('classe'),
                'jour'           => request('jour'),
                'position'       => request('position'),
            ],
            [
                'classe'         => request('classe'),
                'matiere'        => request('matiere'),
                'professeur'     => request('professeur'),
                'jour'           => request('jour'),
                'h_debut'        => request('h_debut'),
                'h_fin'          => request('h_fin'),
                'position'       => request('position'),
                'annee_scolaire' => request('annee_scolaire'),
            ]);

            if ($insertion) {
                Flashy::success('Vous avez enregistré un programme de cours');
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
        $professeur = Personne::findOrFail($id);
        $matiere = Matiere::where('professeur',"$professeur->nom $professeur->prenom")->get();
        $classe = Classe::all();;
        $year   = Year::where('etat',0)->first();

        return view('programs.add_program',compact('professeur','matiere','classe','year'));
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
