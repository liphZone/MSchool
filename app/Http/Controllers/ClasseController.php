<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClasseFormRequest;
use App\Models\Classe;
use App\Models\Level;
use App\Models\Year;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classe = Classe::all();
        return view('classes.list_classes',compact('classe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveau = Level::all();
        $year   = Year::where('etat',0)->get() ;
        return view('classes.add_classe',compact('niveau','year'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClasseFormRequest $request)
    {
        $insertion = Classe::firstOrCreate(
        [
            'libelle'        => ucfirst($request->libelle),
            'serie'          => $request->serie,
            'niveau'         => ucfirst($request->niveau),
            'groupe'         => $request->groupe,
        ],
        [
            'capacite'       => $request->capacite,
            'nbre_matiere'   => $request->nbre_matiere,
        ]);

        if ($insertion) {
            Flashy::success('Vous avez enregistré une classe');
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
