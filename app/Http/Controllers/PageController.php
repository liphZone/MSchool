<?php

namespace App\Http\Controllers;

use App\Models\Bulletin;
use App\Models\Cantine;
use App\Models\Classe;
use App\Models\Depense;
use App\Models\Description;
use App\Models\Fee;
use App\Models\Inscription;
use App\Models\Level;
use App\Models\Matiere;
use App\Models\Message;
use App\Models\Moyenne;
use App\Models\Note;
use App\Models\Payment;
use App\Models\Personne;
use App\Models\Transaction;
use App\Models\Year;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MercurySeries\Flashy\Flashy;

class PageController extends Controller
{
    public function index(){
        return view('layout.utilisateur.index');
    }

    public function accueil(){
        $total_classe = Classe::count();
        $total_matiere = Matiere::count();
        $total_professeur = Personne::where('statut','Professeur')->count();
        $total_eleve = Personne::where('statut','Eleve')->count();
        $annee = Year::where('etat',0)->first();

        //Montant caisse
        #Debit
        $caisse_debit = Transaction::where('type','Caisse')->where('etat','Debit')
        ->where('annee_scolaire',"$annee->annee_debut-$annee->annee_fin")->sum('montant');
        #Credit
        $caisse_credit = Transaction::where('type','Caisse')->where('etat','Credit')
        ->where('annee_scolaire',"$annee->annee_debut-$annee->annee_fin")->sum('montant');

        $montant_caisse = $caisse_debit - $caisse_credit ;

        //Montant banque
        #Debit
        $banque_debit = Transaction::where('type','Banque')->where('etat','Debit')
        ->where('annee_scolaire',"$annee->annee_debut-$annee->annee_fin")->sum('montant');
        #Credit
        $banque_credit = Transaction::where('type','Banque')->where('etat','Credit')
        ->where('annee_scolaire',"$annee->annee_debut-$annee->annee_fin")->sum('montant');

        $montant_banque = $banque_debit - $banque_credit ;

        //Montant inscription
        $montant_inscription = Fee::where('categorie','Inscription')->where('etat','Debit')
        ->where('annee_scolaire',"$annee->annee_debut-$annee->annee_fin")->sum('montant');

        //Montant scolarite
        $scolarite = Fee::where('categorie','Scolarite')->where('etat','Debit')
        ->where('annee_scolaire',"$annee->annee_debut-$annee->annee_fin")->sum('montant');

        //Montant cantine
        $montant_cantine = Cantine::where('annee_scolaire',"$annee->annee_debut-$annee->annee_fin")->sum('montant');

        //Montant depenses
        $depense = Depense::where('annee_scolaire',"$annee->annee_debut-$annee->annee_fin")->sum('montant');

        $montant_caisse_ecole = $montant_caisse + $montant_banque + $montant_cantine + $montant_inscription;//271 100
        $montant_scolarite = $scolarite; // 40000
        $montant_depense = $depense; //6000

        $montant_general = $montant_caisse_ecole + $montant_scolarite + $montant_depense; ///317 100

        $user            = Personne::where('id',auth()->user()->personne_id)->first();
        $message = Message::where('type_message','Chat')->where('recepteur',"$user->nom $user->prenom")
        ->where('annee_scolaire',"$annee->annee_debut-$annee->annee_fin")->get();

        return view('layout.utilisateur.accueil',compact('total_classe','total_matiere','total_professeur','total_eleve','annee'
        ,'montant_caisse_ecole','montant_scolarite','montant_depense','montant_general','message'));
    }

    public function forumlaireProfil(){
        $user = Personne::where('id',auth()->user()->personne_id)->first();
        return view('layout.utilisateur.profil',compact('user'));
    }

    public function actionProfil(){
        $user = Personne::where('id',auth()->user()->personne_id)->first();
        $update = $user->update([
            'nom'     => request('nom'),
            'prenom'  => request('prenom'),
            'adresse' => request('adresse'),
            'contact' => request('contact'),
            'email'   => request('email'),
        ]);

        if ($update) {
            Flashy::success('Information mis à jour');
            return back();
        } else {
            Flashy::error("Echec d'enregistrement");
            return back();
        }
    }

    public function updateProfilPassword(){
        request()->validate([
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required'],
        ]);

        $user = User::where('username',auth()->user()->username)->where('personne_id',auth()->user()->personne_id)->first();
        $update = $user->update([
            'password' => bcrypt(request('password')),
        ]);
        if ($update) {
            Flashy::success("Modification du mot de passe réussie");
            return back();
        } else {
            Flashy::error("Echec modification ");
            return back();
        }
    }

    public function formulaireConnexion(){
        $description = Description::all();
        return view('layout.login.connexion',compact('description'));
    }

    public function actionConnexion(Request $request){
        $request->validate([
            'username'     => 'required',
            'password'     => 'required',
        ]);

        $result=Auth::attempt([
            'username' => request('username'),
            'password' => request('password'),
        ]);

       if($result){
            if (auth()->user()->grade === 'Administrateur') {
                Flashy::success('Bienvenu');
                return redirect()->route('accueil');
            }

            elseif (auth()->user()->grade === 'Secretaire') {
                Flashy::success('Bienvenu');
                return redirect()->route('accueil');
            }

            elseif (auth()->user()->grade === 'Professeur') {
                Flashy::success('Bienvenu');
                return redirect()->route('accueil');
            }

            elseif (auth()->user()->grade === 'Eleve') {
                Flashy::success('Bienvenu');
                return redirect()->route('accueil');
            }

            elseif (auth()->user()->grade === 'Comptable') {
                Flashy::success('Bienvenu');
                return redirect()->route('accueil');
            }

            elseif (auth()->user()->grade === 'Surveillant') {
                Flashy::success('Bienvenu');
                return redirect()->route('accueil');
            }

            else{
                Flashy::success("Vous n\'etes pas identifié !! ");
                return redirect('/');
            }
        }
        else{
            Flashy::error("Erreur d'indentifiant ou de mot de passe ");
            return back();
        }

        // $personne = Personne::firstOrCreate(
        // [
        //     'nom'            => 'FOLY',
        //     'prenom'         => 'philippes'
        // ],
        // [
        //     'sexe'           => 'M',
        //     'adresse'        => 'Deckon',
        //     'contact'        => '92009358',
        //     'email'          => 'philippesf3@gmail.com',
        //     'statut'         => 'Administrateur',
        //     'annee_scolaire' => '2019-2020',
        //     'profil'         => null,
        // ]);

        // $user = User::firstOrCreate(
        // [
        //     'username'    => 'philippes',
        // ],
        // [
        //     'password'    => bcrypt('philippes'),
        //     'grade'       => 'Administrateur',
        //     'personne_id' => $personne->id,
        // ]);

        // if ($personne AND $user) {
        //     Flashy::success('Vous avez enregistré un utilisateur');
        //     return back();
        // } else {
        //     Flashy::error("Echec d'enregistrement");
        //     return back();
        // }


    	return back()->withInput()->withErrors([
    	'username'=>'Identifiant ou mot de passe incorrect .',
    	]);
    }
     //Formulaire pour initialiser la caisse
     public function formulaireInitCaisse(){
        $year   = Year::where('etat',0)->get();
        return view('transactions.init_caisse',compact('year'));
    }

    public function actionInitCaisse(Request $request){
        $request->validate([
            'libelle' => 'required',
            'montant' => 'required|numeric',
        ]);

        $insert = Transaction::firstOrCreate([
            'libelle'        => $request->libelle,
            'montant'        => $request->montant,
            'date'           => date('Y-m-d'),
            'type'           => 'Caisse',
            'etat'           => 'Debit',
            'annee_scolaire' => $request->annee_scolaire,
            'utilisateur'    => auth()->user()->username,
            'status'         => 0
        ]);

        if ($insert) {
            Flashy::success('La caisse a été initialisé avec succès');
            return back();
        } else {
            Flashy::error("Echec ");
            return back();
        }
    }

    /************************************** INSCRIPTION EN 4 PARTIES ****************************************************/

    public function formulaireInscriptionElevePartOne(){
        $classe = Classe::all();
        $niveau = Level::all();
        $year   = Year::where('etat',0)->get();
        return view('inscriptions.part_one_entry',compact('classe','niveau','year'));
    }

    public function actionInscriptionElevePartTwo(Request $request){
        if (!empty($request->profil)) {
            $request->validate([
                'matricule'      => 'required',
                'nom'            => 'required',
                'prenom'         => 'required',
                'date_naissance' => 'required',
                'lieu_naissance' => 'required|string',
                'age'            => 'required',
                'adresse'        => 'required',
                'classe'         => 'required',
                'etat'           => 'required',
                'profil'         => 'sometimes|file|image|mimes:png,jpg,jpeg',
                'montant'        => 'required|numeric',
            ]);

            $insertion = Inscription::firstOrCreate([
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
                'provenance' 					=> request('provenance'),
                'etat' 							=> request('etat'),
                'niveau' 					    => request('niveau'),
                'profil' 						=> request('profil')->store('Zone','public'),
                'annee_scolaire' 				=> request('annee_scolaire'),
                'montant' 						=> request('montant'),
                'date' 							=> request('date'),
            ]);

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
                'statut'         => 'Eleve',
                'annee_scolaire' => $request->annee_scolaire,
                'profil'         => request('profil')->store('Zone','public'),
            ]);

            $frais_inscription = Fee::create(
            [
                'montant'        => request('montant'),
                'niveau'         => request('niveau'),
                'date'           => request('date'),
                'etat'           => 'Debit',
                'utilisateur'    => auth()->user()->username,
                'annee_scolaire' => request('annee_scolaire'),
                'categorie'      => 'Inscription',
            ]);

            if ($insertion AND $personne AND $frais_inscription) {
                Flashy::success('Etape 1 validée');
                return view('inscriptions.part_two_entry',compact('matricule'));
            } else {
                Flashy::error('Echec');
                return back();
            }
        }
        else{

            $request->validate([
                'matricule'      => 'required',
                'nom'            => 'required',
                'prenom'         => 'required',
                'date_naissance' => 'required',
                'lieu_naissance' => 'required|string',
                'age'            => 'required',
                'adresse'        => 'required',
                'classe'         => 'required',
                'etat'           => 'required',
                'montant'        => 'required|numeric',
            ]);

            $insertion = Inscription::firstOrCreate([
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
                'provenance' 					=> request('provenance'),
                'etat' 							=> request('etat'),
                'niveau' 					    => request('niveau'),
                'profil' 						=> null,
                'annee_scolaire' 				=> request('annee_scolaire'),
                'montant' 						=> request('montant'),
                'date' 							=> request('date'),
            ]);

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
                'statut'         => 'Eleve',
                'annee_scolaire' => $request->annee_scolaire,
                'profil'         => null,
            ]);

            $frais_inscription = Fee::create(
            [
                'montant'        => request('montant'),
                'niveau'         => request('niveau'),
                'date'           => request('date'),
                'etat'           => 'Debit',
                'utilisateur'    => auth()->user()->username,
                'annee_scolaire' => request('annee_scolaire'),
                'categorie'      => 'Inscription',
            ]);

            $matricule  = request('matricule');
        }
        if ($insertion AND $personne AND $frais_inscription) {
            Flashy::success('Etape 1 validée');
            return view('inscriptions.part_two_entry',compact('matricule'));
        } else {
            Flashy::error('Echec');
            return back();
        }
    }

    public function FormulaireInscriptionElevePartTwo(){
        return view('inscriptions.part_two_entry');
    }

    public function actionInscriptionElevePartThree(Request $request){
        $request->validate([
            'type_parent'       => 'required',
            'nom_parent'        => 'required',
            'sexe_parent'       => 'required',
            'profession_parent' => 'required',
            'adresse_parent'    => 'required',
            'contact_parent'    => 'required',
        ]);
        $matricule = $request->matricule;

        $data = Inscription::where('matricule',request('matricule'))->first();

        $maj1 = $data->update([
            'type_parent'                  => request('type_parent'),
            'nom_parent'                   => request('nom_parent'),
            'sexe_parent'                  => request('sexe_parent'),
            'profession_parent'            => request('profession_parent'),
            'adresse_parent'               => request('adresse_parent'),
            'email_parent'                 => request('email_parent'),
            'contact_parent'               => request('contact_parent'),
            'nom_parent_secondaire'        => request('nom_parent_secondaire'),
            'profession_parent_secondaire' => request('profession_parent_secondaire'),
            'contact_parent_secondaire'    => request('contact_parent_secondaire'),
            'autre_parent'                 => request('autre_parent'),
            'profession_autre_parent'      => request('profession_autre_parent'),
            'contact_autre_parent'         => request('contact_autre_parent'),
        ]);

        if ($maj1) {
            Flashy::success('Etape 2 validée');
            return view('inscriptions.part_three_entry',compact('matricule'));
        } else {
            Flashy::error('Echec');
            return back();
        }
    }

    public function formulaireInscriptionElevePartThree(){
        return view('inscriptions.part_three_entry');
    }

    public function actionInscriptionElevePartFour(Request $request){
        $request->validate([
            'username'     => 'required',
            'password'     => 'required|confirmed|min:5',
            'password.min' => 'Aumoins :min caractères.',
        ]);

        $data = Inscription::where('matricule',request('matricule'))->first();

        $personne = Personne::where('nom',$data->nom)->where('prenom',$data->prenom)->first();

        $username   = request('username');
        $password   = bcrypt(request('password'));
        $grade      = 'Eleve';

        $insertion = User::firstOrCreate([
            'username'    => $username,
        ],
        [
            'password'    => $password,
            'grade'       => $grade,
            'personne_id' => $personne->id,
        ]);

        $eleve = Inscription::all();

        if ($insertion) {
            Flashy::success('Inscription terminée');
            return view('inscriptions.list_inscriptions',compact('eleve'));
        } else {
            Flashy::error('Echec');
            return back();
        }
    }

    public function FormulaireInscriptionElevePartFour(){
        return view('inscriptions.part_four_entry');
    }

    /************************************** FIN INSCRIPTION ****************************************************/

    public function formulaireMessageDiffusion(){
        $year = Year::where('etat',0)->get();
        return view('messages.add_diffusion',compact('year'));
    }

    public function actionMessageDiffusion(Request $request){
        $request->validate([
            'commentaire' => 'required',
        ]);

        $insertion  = Message::firstOrCreate([
            'utilisateur'    => auth()->user()->username,
            'type_message'   => 'Diffusion',
            'commentaire'    => $request->commentaire,
            'date'           => date('Y-m-d'),
            'annee_scolaire' => request('annee_scolaire'),
        ]);

        if ($insertion) {
            Flashy::success('Le message a été diffusé');
            return back();
        } else {
            Flashy::error('Echec');
            return back();
        }
    }

    public function actionLireChatMessage(Request $request){
        $message = Message::findOrFail($request->id);

        $maj = $message->update([
            'etat' => 1
        ]);

        if ($maj) {
            Flashy::success('Le message a été lu');
            return redirect()->route('list_messages');
        } else {
            Flashy::error('Echec');
            return back();
        }
    }

    public function actionLireAllChatMessage(){
        $message = Message::where('type_message','Chat')->where('etat',0)->first();

        // $maj = $message->update([
        //     'etat' => 1
        // ]);
        // if ($maj) {
        //     Flashy::success('Tous les messages ont été lu');
        //     return redirect()->route('list_messages');
        // } else {
        //     Flashy::error('Echec');
        //     return back();
        // }
    }

    public function actionLireDiffusionMessage(Request $request){
        $message = Message::findOrFail($request->id);
        return back();

        // $maj = $message->update([
        //     'etat' => 1
        // ]);
    }

    public function afficherBulletin(){
        $classe = Classe::all();
        //Description de l'ecole
        $description = Description::all();
        //Liste des eleves par classe
        $eleve = Inscription::where('classe',request('classroom'))->get();

        $bulletin = Bulletin::where('classe',request('classroom'))->get();

        //Nombre total d'eleves par classe
        $count_eleve_classe = Inscription::where('classe',request('classroom'))->count('matricule');

        //Matieres Litteraires ------------>
        $matiere_litteraire = Matiere::where('classe',request('classroom'))->where('type_matiere','Litteraire')->get();

        #Notes + professeurs matieres litteraires
        $litteraire = Moyenne::where('classe',request('classroom'))->where('type_matiere','Litteraire')->get();

        #Somme des coefficients litteraires
        $somme_coef_litteraire = Matiere::where('classe',request('classroom'))->where('type_matiere','Litteraire')->sum('coefficient');

        #Somme matieres litteraires de l'eleve ( directement sur la page)

        //Matieres Litteraires Fin ------------>

        //Matieres Scientifiques
        $matiere_scientifique = Matiere::where('classe',request('classroom'))->where('type_matiere','Scientifique')->get();

        #Notes + professeurs matieres Scientifique
        $scientifique = Moyenne::where('classe',request('classroom'))->where('type_matiere','Scientifique')->get();

        #Somme des coefficients Scientifique
        $somme_coef_scientifique = Matiere::where('classe',request('classroom'))->where('type_matiere','Scientifique')->sum('coefficient');

        #Somme matieres Scientifique de l'eleve ( directement sur la page)

        //Matieres Scientifiques Fin

        //Matieres Faculatives
        $matiere_facultative = Matiere::where('classe',request('classroom'))->where('type_matiere','Facultative')->get();

        #Notes + professeurs matieres Facultatives
        $facultative = Moyenne::where('classe',request('classroom'))->where('type_matiere','Facultative')->get();

        #Somme des coefficients Facultatives
        $somme_coef_facultative = Matiere::where('classe',request('classroom'))->where('type_matiere','Facultative')->sum('coefficient');

        #Somme matieres Facultatives de l'eleve ( directement sur la page)
        //Matieres Faculatives Fin

        //Somme de tous les coefficients (directement sur la page)

        //Moyenne forte
        $moyenne_forte = Bulletin::where('classe',request('classroom'))->where('rang',1)->first();

        //Moyenne faible
        $moyenne_faible = Bulletin::where('classe',request('classroom'))->orderBy('moyenne','asc')->first();

        //Rang eleve (directement sur la page)

        $year     = Year::where('etat',0)->get();

        return view('bulletins.afficher_bulletin',compact('classe','description','eleve','bulletin','count_eleve_classe',
        'matiere_litteraire','litteraire','somme_coef_litteraire',
        'matiere_scientifique','scientifique','somme_coef_scientifique',
        'matiere_facultative','facultative','somme_coef_facultative','moyenne_forte','moyenne_faible','year'));
    }

    public function elevesAjour(){
        $eleve = Payment::where('montant_restant',0)->get();
        $year  = Year::where('etat',0)->get();
        return view('payments.student_updated',compact('eleve','year'));
    }

    public function elevesPasAjour(){
        //Les eleves n'ayant soldé aucune scolarité
        $eleve = DB::select("SELECT * FROM inscriptions WHERE CONCAT(nom,'',prenom)
        NOT IN( SELECT CONCAT(nom,'',prenom) FROM payments )");

        //Les eleves ayant soldé une partie de la scolarite
        $eleve_two = DB::select("SELECT * FROM inscriptions WHERE CONCAT(nom,'',prenom)
        IN( SELECT CONCAT(nom,'',prenom) FROM payments )");
        $year  = Year::where('etat',0)->get();
        return view('payments.student_unupdated',compact('eleve','eleve_two','year'));
    }

    public function deconnexion(){
        Auth::logout();
        Flashy::success('Vous êtes déconnecté');
        return redirect('/');
    }

}
