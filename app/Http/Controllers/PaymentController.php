<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentFormRequest;
use App\Models\Fee;
use App\Models\Inscription;
use App\Models\Level;
use App\Models\Payment;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eleve = Inscription::all();
        return view('payments.list_payments',compact('eleve'));
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
    public function store(PaymentFormRequest $request)
    {
        $insertion = Payment::create([
            'nom'             => request('nom'),
            'prenom'          => request('prenom'),
            'niveau'          => request('niveau'),
            'classe'          => request('classe'),
            'annee_scolaire'  => request('annee_scolaire'),
            'scolarite'       => request('scolarite'),
            'montant_paye'    => request('montant_paye'),
            'montant_restant' => request('montant_restant'),
            'date'            => date('Y-m-d'),
            'utilisateur'     => auth()->user()->username,
        ]);

        $frais_inscription = Fee::create(
        [
            'montant'        => request('montant_paye'),
            'niveau'         => request('niveau'),
            'date'           => date('Y-m-d'),
            'etat'           => 'Debit',
            'utilisateur'    => auth()->user()->username,
            'annee_scolaire' => request('annee_scolaire'),
            'categorie'      => 'Scolarite',
        ]);

        if ($insertion AND $frais_inscription) {
            Flashy::success('Vous avez enregistré un payement');
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
        $eleve = Inscription::findOrFail($id);
        $scolarite = Level::where('libelle',$eleve->niveau)->first();
        $sum_montant_deja_paye = Payment::where('nom',$eleve->nom)->where('prenom',$eleve->prenom)->sum('montant_paye');
        return view('payments.add_payment',compact('eleve','scolarite','sum_montant_deja_paye'));
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
