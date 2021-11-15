<?php

use App\Http\Controllers\bulletinController;
use App\Http\Controllers\CantineController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MoyenneController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WarningController;
use App\Http\Controllers\YearController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Page de connexion
Route::get('/',[PageController::class,'formulaireConnexion'])->name('login_form');

//Page Action connexion
Route::post('Connexion',[PageController::class,'actionConnexion'])->name('login_action');

//Middleware
Route::middleware(['Connection'])->group(function () {

    //Page index utilisateur
    Route::get('index',[PageController::class,'index'])->name('index');

    //Page accueil
    Route::get('accueil',[PageController::class,'accueil'])->name('accueil');

    //Resource eleves
    Route::resource('inscriptions',InscriptionController::class)->names([
        'create' => 'add_inscription',
        'index'  => 'list_inscriptions',
    ]);

    //Formulaire 1 de l'inscription des eleves
    Route::get('inscription 1',[PageController::class,'formulaireInscriptionElevePartOne'])->name('first_part_entry_form');

    //Formulaire 2 de l'inscription des eleves
    Route::get('inscription 2',[PageController::class,'formulaireInscriptionElevePartTwo'])->name('second_part_entry_form');

    //Action 2 de l'inscription des eleves
    Route::post('Inscription 2',[PageController::class,'actionInscriptionElevePartTwo'])->name('second_part_entry_action');

    //Formulaire 3 de l'inscription des eleves
    Route::get('inscription 3',[PageController::class,'formulaireInscriptionElevePartThree'])->name('third_part_entry_form');

    //Action 3 de l'inscription des eleves
    Route::post('Inscription 3',[PageController::class,'actionInscriptionElevePartThree'])->name('third_part_entry_action');

    //Action 4 de l'inscription des eleves
    Route::post('Inscription 4',[PageController::class,'actionInscriptionElevePartFour'])->name('fourth_part_entry_action');

    //Resource classe
    Route::resource('classes',ClasseController::class)->names([
        'create' => 'add_classe',
        'index'  => 'list_classes',
    ]);

    //Resource niveau
    Route::resource('levels',LevelController::class)->names([
        'create' => 'add_level',
        'index'  => 'list_levels',
    ]);

    //Resource matiere
    Route::resource('matieres',MatiereController::class)->names([
        'create' => 'add_matiere',
        'index'  => 'list_matieres',
    ]);

    //Resource personnes
    Route::resource('personnes',PersonneController::class)->names([
        'create' => 'add_person',
        'index'  => 'list_persons',
    ]);

    //Resource description
    Route::resource('descriptions',DescriptionController::class)->names([
        'create' => 'add_description',
        'index'  => 'list_descriptions',
    ]);

    //Resource cantines
    Route::resource('cantines',CantineController::class)->names([
        'show'  => 'add_cantine',
        'index' => 'list_cantines',
    ]);

    //Resource emploi du temps
    Route::resource('programs',ProgramController::class)->names([
        'show'   => 'add_program',
        'index'  => 'list_programs',
    ]);

    //Resource payement ecolage
    Route::resource('payments',PaymentController::class)->names([
        'show'  => 'add_payment',
        'index' => 'list_payments',
    ]);

    //Liste des eleves a jour
    Route::get('Eleves a jour',[PageController::class,'elevesAjour'])->name('student_updated');

    //Liste des eleves non a jour
    Route::get('Eleves pas a jour',[PageController::class,'elevesPasAjour'])->name('student_unupdated');

    // Resource years
    Route::resource('years',YearController::class)->names([
        'create' => 'add_year',
        'index'  => 'list_years',
        'edit'   => 'edit_year'
    ]);

    // Resource notes
    Route::resource('notes',NoteController::class)->names([
        'show'  => 'add_note',
        'index' => 'list_notes',
    ]);

    // Resource moyennes
    Route::resource('moyennes',MoyenneController::class)->names([
        'show'  => 'add_moyenne',
        'index' => 'list_moyennes',
    ]);

    // Resource bulletins
    Route::resource('bulletins',bulletinController::class)->names([
        'show'  => 'add_bulletin',
        'index' => 'list_bulletins',
    ]);

    //Page pour afficher les bulletins suivant les classes
    Route::get('bulletin',[PageController::class,'afficherBulletin'])->name('display_bulletin');

    // Resource depenses
    Route::resource('depenses',DepenseController::class)->names([
        'create' => 'add_depense',
        'index'  => 'list_depenses',
    ]);

    // Resource compte comptable
    Route::resource('comptes',CompteController::class)->names([
        'create' => 'add_compte',
        'index'  => 'list_comptes',
    ]);

    // Resource messages
    Route::resource('messages',MessageController::class)->names([
        'show'  => 'add_message',
        'index' => 'list_messages',
    ]);

    //action lire chat
    Route::get('lire chat/{id}',[PageController::class,'actionLireChatMessage'])->name('read_chat_message_action');

    //action lire tous les messages chat
    Route::get('lire tous les messages chat',[PageController::class,'actionLireAllChatMessage'])->name('read_all_chat_message_action');

    //action lire diffusion
    Route::get('lire message diffusion/{id}',[PageController::class,'actionLireDiffusionMessage'])->name('read_diffusion_message_action');

    //Formulaire de message de diffusion
    Route::get('diffuser',[PageController::class,'formulaireMessageDiffusion'])->name('message_broadcastin_form');

    //Action message de diffusion
    Route::post('Diffuser',[PageController::class,'actionMessageDiffusion'])->name('message_broadcastin_action');

    // Resource transactions
    Route::resource('transactions',TransactionController::class)->names([
        'create' => 'add_transaction',
        'index'  => 'list_transactions',
    ]);

    //Formulaire initialiser caisse avec un montant
    Route::get('initialiser caisse',[PageController::class,'formulaireInitCaisse'])->name('init_caisse_form');

    //Action initialiser caisse
    Route::post('Initialiser caisse',[PageController::class,'actionInitCaisse'])->name('init_caisse_action');

    // Resource warning (absence + retard)
    Route::resource('warnings',WarningController::class)->names([
        'show'  => 'add_warning',
        'index' => 'list_warnings',
    ]);

    //Formulaire profil utilisateur
    Route::get('profil',[PageController::class,'forumlaireProfil'])->name('profile_form');

    //Action profil utilisateur
    Route::post('Profil',[PageController::class,'actionProfil'])->name('profile_action');

    //action modifier mot de passe profil
    Route::post('update password',[PageController::class,'updateProfilPassword'])->name('profile_password_update');

    //Page de deconnexion
    Route::get('deconnexion',[PageController::class,'deconnexion'])->name('logout');

});

//Fin Middleware




