<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionFormRequest;
use App\Models\Fee;
use App\Models\Transaction;
use App\Models\Year;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transaction::all();

        return view('transactions.list_transactions',compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $year = Year::where('etat',0)->get();
        $montant_scolarite = Fee::where('categorie','Scolarite')->sum('montant');

        #banque_debit
        $banque_debit = Transaction::where('type','Banque')->where('etat','Debit')->sum('montant');

        #banque_credit
        $banque_credit = Transaction::where('type','Banque')->where('etat','Credit')->sum('montant');

        #caisse_debit
        $caisse_debit = Transaction::where('type','Caisse')->where('etat','Debit')->sum('montant');

        #caisse_credit
        $caisse_credit = Transaction::where('type','Caisse')->where('etat','Credit')->sum('montant');

        $montant_banque = $banque_debit - $banque_credit;
        $montant_caisse = $caisse_debit - $caisse_credit;

        return view('transactions.add_transaction',compact('year','montant_scolarite','montant_banque','montant_caisse'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionFormRequest $request)
    {
        if (request('type_one') === 'Caisse' AND request('type_two') === 'Banque') {

            $credit_caisse = Transaction::firstOrCreate(
            [
                'libelle'        => request('libelle'),
                'etat'           => 'Credit',
            ],
            [
                'montant'        => request('montant'),
                'date'           => date('Y-m-d'),
                'type'           => 'Caisse',
                'utilisateur'    => auth()->user()->username,
                'annee_scolaire' => request('annee_scolaire'),
            ]);

            $debit_banque = Transaction::firstOrCreate(
            [
                'libelle'        => request('libelle'),
                'etat'           => 'Debit',
            ],
            [
                'montant'        => request('montant'),
                'date'           => date('Y-m-d'),
                'type'           => 'Banque',
                'utilisateur'    => auth()->user()->username,
                'annee_scolaire' => request('annee_scolaire'),
            ]);

            if ($credit_caisse AND $debit_banque) {
                Flashy::success('Transaction réussie');
                return back();
            } else {
                Flashy::error("Echec ");
                return back();
            }

        }
        elseif (request('type_one') === 'Banque' AND request('type_two') === 'Caisse') {

            $credit_banque = Transaction::firstOrCreate(
            [
                'libelle'        => request('libelle'),
                'etat'           => 'Credit',
            ],
            [
                'montant'        => request('montant'),
                'date'           => date('Y-m-d'),
                'type'           => 'Banque',
                'utilisateur'    => auth()->user()->username,
                'annee_scolaire' => request('annee_scolaire'),
            ]);

            $debit_caisse = Transaction::firstOrCreate(
            [
                'libelle'        => request('libelle'),
                'etat'           => 'Debit',
            ],
            [
                'montant'        => request('montant'),
                'date'           => date('Y-m-d'),
                'type'           => 'Caisse',
                'utilisateur'    => auth()->user()->username,
                'annee_scolaire' => request('annee_scolaire'),
            ]);

            if ($credit_banque AND $debit_caisse) {
                Flashy::success('Transaction réussie');
                return back();
            } else {
                Flashy::error("Echec ");
                return back();
            }
        }
        elseif (request('type_one') === 'Scolarite' AND request('type_two') === 'Caisse') {
            $credit_scolarite = Fee::firstOrCreate(
            [
                'libelle'        => request('libelle'),
                'etat'           => 'Debit',
            ],
            [
                'montant'        => request('montant'),
                'date'           => date('Y-m-d'),
                'categorie'      => 'Scolarite',
                'utilisateur'    => auth()->user()->username,
                'annee_scolaire' => request('annee_scolaire'),
            ]);

            $debit_caisse = Transaction::firstOrCreate(
            [
                'libelle'        => request('libelle'),
                'etat'           => 'Debit',
            ],
            [
                'montant'        => request('montant'),
                'date'           => date('Y-m-d'),
                'type'           => 'Caisse',
                'utilisateur'    => auth()->user()->username,
                'annee_scolaire' => request('annee_scolaire'),
            ]);

            if ($credit_scolarite AND $debit_caisse) {
                Flashy::success('Transaction réussie');
                return back();
            } else {
                Flashy::error("Echec ");
                return back();
            }
        }
        elseif (request('type_one') === 'Caisse' AND request('type_two') === 'Scolarite') {
            $credit_caisse = Transaction::firstOrCreate(
            [
                'libelle'        => request('libelle'),
                'etat'           => 'Credit',
            ],
            [
                'montant'        => request('montant'),
                'date'           => date('Y-m-d'),
                'type'           => 'Caisse',
                'utilisateur'    => auth()->user()->username,
                'annee_scolaire' => request('annee_scolaire'),
            ]);

            $debit_scolarite = Fee::firstOrCreate(
            [
                'libelle'        => request('libelle'),
                'etat'           => 'Debit',
            ],
            [
                'montant'        => request('montant'),
                'date'           => date('Y-m-d'),
                'categorie'      => 'Scolarite',
                'utilisateur'    => auth()->user()->username,
                'annee_scolaire' => request('annee_scolaire'),
            ]);

            if ($credit_caisse AND $debit_scolarite) {
                Flashy::success('Transaction réussie');
                return back();
            } else {
                Flashy::error("Echec ");
                return back();
            }
        }
        else{
            Flashy::error("Echec");
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
