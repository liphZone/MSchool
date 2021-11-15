$table->string('annee_scolaire')->nullable();
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('emetteur')->nullable();
            $table->string('recepteur')->nullable();
            $table->string('sujet')->nullable();
            $table->string('contenu')->nullable();
            $table->string('utilisateur')->nullable();
            $table->string('commentaire')->nullable();
            $table->enum('type_message',['Chat','Diffusion']);
            $table->string('date');
            $table->enum('etat',[0,1]);
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
        Schema::dropIfExists('messages');
    }
}
