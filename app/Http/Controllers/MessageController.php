<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Personne;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year                  = Year::where('etat',0)->first();
        $message_diffusion     = Message::where('type_message','Diffusion')
        ->where('annee_scolaire',"$year->annee_debut-$year->annee_fin")->get();
        $user                  = Personne::where('id',auth()->user()->personne_id)->first();
        $message_prive_send    = Message::where('type_message','Chat')->where('emetteur',"$user->nom $user->prenom")
        ->where('annee_scolaire',"$year->annee_debut-$year->annee_fin")->get();
        $message_prive_receive = Message::where('type_message','Chat')->where('recepteur',"$user->nom $user->prenom")
        ->where('annee_scolaire',"$year->annee_debut-$year->annee_fin")->get();
        return view('messages.list_messages',compact('message_diffusion','message_prive_send','message_prive_receive','year'));
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
        $insertion = Message::firstOrCreate([
            'emetteur'       => request('emetteur'),
            'recepteur'      => request('recepteur'),
            'sujet'          => request('sujet'),
            'contenu'        => request('contenu'),
            'type_message'   => 'Chat',
            'date'           => date('Y-m-d'),
            'utilisateur'    => auth()->user()->username,
            'annee_scolaire' => request('annee_scolaire'),
        ]);

        if ($insertion) {
            Flashy::success('Vous avez envoyé un message');
            return back();
        } else {
            Flashy::error("Echec d'envoie ");
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
        $year     = Year::where('etat',0)->get();
        $user     = Personne::where('id',auth()->user()->personne_id)->first();
        $personne = Personne::findOrFail($id);
        return view('messages.add_message',compact('year','user','personne'));
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
