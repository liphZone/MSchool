<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->string('age');
            $table->enum('sexe',['M','F']);
            $table->string('adresse');
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('provenance')->nullable();
            $table->enum('etat',['A','N']);
            $table->text('profil')->nullable();
            $table->string('annee_scolaire');
            $table->string('niveau');
            $table->enum('type_parent',['Pere','Mere','Oncle','Tante','Tuteur'])->default('Pere');
            $table->string('nom_parent')->nullable();
            $table->enum('sexe_parent',['Masculin','Feminin'])->default('Masculin');
            $table->string('profession_parent')->nullable();
            $table->string('adresse_parent')->nullable();
            $table->string('email_parent')->nullable();
            $table->string('contact_parent')->nullable();
            $table->string('nom_parent_secondaire')->nullable();
            $table->string('profession_parent_secondaire')->nullable();
            $table->string('contact_parent_secondaire')->nullable();
            $table->string('autre_parent')->nullable();
            $table->string('profession_autre_parent')->nullable();
            $table->string('contact_autre_parent')->nullable();
            $table->float('montant');
            $table->string('date');
            $table->string('classe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscriptions');
    }
}
