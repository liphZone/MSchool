<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonneFormRequest;
use App\Http\Requests\UserFormRequest;
use App\Models\Personne;
use App\Models\Year;
use App\Models\User;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personne = Personne::all();
        return view('personnes.list_persons',compact('personne'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $year = Year::where('etat',0)->get();
        return view('personnes.add_person',compact('year'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonneFormRequest $request)
    {
        if (!empty($request->profil)) {
            $path = $request->profil->store('Zone','public');
            $personne = Personne::firstOrCreate(
            [
                'nom'             => strtoupper($request->nom),
                'prenom'          => ucfirst($request->prenom)
            ],
            [
                'sexe'            => $request->sexe,
                'adresse'         => $request->adresse,
                'contact'         => $request->contact,
                'email'           => $request->email,
                'statut'          => $request->statut,
                'annee_scolaire'  => $request->annee_scolaire,
                'profil'          => $path,
              
            ]);

            $user = User::firstOrCreate(
            [
                'username'   => $request->username,
            ],
            [
                'password'    => bcrypt($request->password),
                'grade'       => $request->statut,
                'personne_id' => $personne->id,
            ]);

            if ($personne AND $user) {
                Flashy::success('Vous avez enregistré un utilisateur');
                return back();
            } else {
                Flashy::error("Echec d'enregistrement");
                return back();
            }
        }
        else{
            $personne = Personne::firstOrCreate(
            [
                'nom'            => strtoupper($request->nom),
                'prenom'         => ucfirst($request->prenom)
            ],
            [
                'sexe'           => $request->sexe,
                'adresse'        => $request->adresse,
                'contact'        => $request->contact,
                'email'          => $request->email,
                'statut'         => $request->statut,
                'annee_scolaire' => $request->annee_scolaire,
                'profil'         => null,
            ]);

            $user = User::firstOrCreate(
            [
                'username'    => $request->username,
            ],
            [
                'password'    => bcrypt($request->password),
                'grade'       => $request->statut,
                'personne_id' => $personne->id,
            ]);

            if ($personne AND $user) {
                Flashy::success('Vous avez enregistré un utilisateur');
                return back();
            } else {
                Flashy::error("Echec d'enregistrement");
                return back();
            }
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
