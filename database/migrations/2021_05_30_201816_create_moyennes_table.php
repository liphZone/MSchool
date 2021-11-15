<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoyennesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moyennes', function (Blueprint $table) {
            $table->id();
            $table->enum('periode',['Semestre','Trimestre']);
            $table->enum('term',[1,2,3]);
            $table->string('nom');
            $table->string('prenom');
            $table->string('classe');
            $table->string('professeur');
            $table->string('matiere');
            $table->string('type_matiere');
            $table->float('interrogation');
            $table->float('devoir');
            $table->float('examen');
            $table->integer('coefficient');
            $table->float('avg_matiere');
            $table->float('avg_matiere_coef');
            $table->string('date');
            $table->string('utilisateur');
            $table->string('annee_scolaire');
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
        Schema::dropIfExists('moyennes');
    }
}
