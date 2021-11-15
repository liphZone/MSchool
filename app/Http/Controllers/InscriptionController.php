<?php

namespace App\Http\Controllers;

use App\Http\Requests\InscriptionFormRequest;
use App\Models\Classe;
use App\Models\Inscription;
use App\Models\Matiere;
use App\Models\Moyenne;
use App\Models\Personne;
use App\Models\Scolarite;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MercurySeries\Flashy\Flashy;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year   = Year::where('etat',0)->first();

        $eleve  = Inscription::where('annee_scolaire',"$year->annee_debut-$year->annee_fin")->get();
        $classe = Classe::all();

        return view('inscriptions.list_inscriptions',compact('eleve','classe','year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $year   = Year::where('etat',0)->get();
        $classe = Classe::all();
        return view('inscriptions.add_inscription',compact('year','classe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InscriptionFormRequest $request)
    {
        $insertion = Inscription::firstOrCreate(
        [
            'matricule' 					=> request('matricule'),
            'nom' 							=> strtoupper(request('nom')),
            'prenom' 						=> ucfirst(request('prenom')),
            'classe' 						=> request('classe'),
        ],
        [

            'date_naissance' 				=> request('date_naissance'),
            'lieu_naissance' 				=> request('lieu_naissance'),
            'age' 							=> request('age'),
            'sexe' 							=> request('sexe'),
            'adresse' 						=> request('adresse'),
            'contact' 					    => request('contact'),
            'email' 						=> request('email'),
            'niveau' 						=> request('niveau'),
            'provenance' 					=> request('provenance'),
            'etat' 							=> request('etat'),
            'profil' 						=> request('profil')->store('Zone','public'),
            'annee_scolaire' 				=> request('annee_scolaire'),
            'type_parent' 					=> request('type_parent'),
            'nom_parent'					=> request('nom_parent'),
            'sexe_parent' 					=> request('sexe_parent'),
            'profession_parent' 			=> request('profession_parent'),
            'adresse_parent'				=> request('adresse_parent'),
            'email_parent' 					=> request('email_parent'),
            'contact_parent' 		   		=> request('contact_parent'),
            'nom_parent_secondaire'	   		=> request('nom_parent_secondaire'),
            'profession_parent_secondaire'  => request('profession_parent_secondaire'),
            'contact_parent_secondaire'		=> request('contact_parent_secondaire'),
            'autre_parent'					=> request('autre_parent'),
            'profession_autre_parent'		=> request('profession_autre_parent'),
            'contact_autre_parent'			=> request('contact_autre_parent'),
            'montant' 						=> request('montant'),
            'date' 							=> request('date'),
        ]);





        // $compte = Account::firstOrCreate(
        // [
        //     'username' => request('username'),
        // ],
        // [
        //     'username' => request('username'),
        //     'password' => bcrypt(request('password')),
        //     'status'   => request('status'),
        //     'user'     =>  request('user'),
        // ]);

        // $scolarite = Scolarite::create(
        //     [
        //         'montant'        => request('montant'),
        //         'date'           => request('date'),
        //         'etat'           => 'Debit',
        //         'utilisateur'    => auth()->user()->user,
        //         'annee_scolaire' => request('annee_scolaire'),
        //     ]);

        // if ($insertion AND $compte AND $scolarite) {
        //     Flashy::success('Vous avez enregistré un(e) elève');
        //     Flashy::success('Vous avez crée un compte');
        //     return back();
        // } else {
        //     Flashy::error("Echec d'enregistrement");
        //     return back();
        // }
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
