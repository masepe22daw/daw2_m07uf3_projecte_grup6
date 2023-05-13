<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpcvDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Taula PROJECTES
        Schema::create('projectes', function (Blueprint $table) {
            $table->string('CodiProj', 6)->primary();
            $table->string('name');
            $table->date('DataInici');
            $table->date('DataFinalitzacio');
            $table->string('Classificacio');
            $table->integer('HoresAssignades');
            $table->integer('PressupostAssignat');
            $table->integer('MaximInvestigadorsAssignables');
            $table->string('NomCognomsResponsable');
            $table->string('Investigacio');
            $table->string('IdiomaTreball');
        });

        // Taula INVESTIGADORS
        Schema::create('investigadors', function (Blueprint $table) {
            $table->string('Passaport', 20)->primary();
            $table->string('CodiAssegMèdica');
            $table->string('name');
            $table->string('Especialitat');
            $table->string('Telefon');
            $table->string('Adreça');
            $table->string('Ciutat');
            $table->string('País');
            $table->string('email')->unique();
            $table->string('Titulacio');
        });

        // Taula PARTICIPA
        Schema::create('participa', function (Blueprint $table) {
            $table->string('Passaport', 20);
            $table->string('CodiProj', 6);
            $table->date('DataIniciContractacio');
            $table->date('DataFinalContractacio');
            $table->float('Retribucio');
            $table->boolean('ParticipacioProrrogable');
            $table->boolean('ParticiparaPublicacioCientifica');
            $table->primary(['Passaport', 'CodiProj']);
            $table->foreign('Passaport')->references('Passaport')->on('investigadors');
            $table->foreign('CodiProj')->references('CodiProj')->on('projectes');
        });

        // Taula USUARIS
        Schema::create('users', function (Blueprint $table) {
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('Tipus');
            $table->timestamp('DarreraHoraEntrada')->nullable();
            $table->timestamp('DarreraHoraSortida')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar taules en ordre invers
        Schema::dropIfExists('usuaris');
        Schema::dropIfExists('participa');
        Schema::dropIfExists('investigadors');
        Schema::dropIfExists('projectes');
    }
}
