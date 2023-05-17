<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        Schema::create('PROJECTES', function (Blueprint $table) {
            $table->char('CodiProj', 6)->primary();
            $table->string('Nom', 255);
            $table->date('DataInici');
            $table->date('DataFinal');
            $table->enum('Classificacio', ['Tècnica', 'Salut', 'Científica', 'Altres']);
            $table->integer('HoresAssignades');
            $table->decimal('PressupostAssignat', 10, 2);
            $table->integer('MaxNumInvestigadors');
            $table->string('Responsable', 255);
            $table->enum('Investigacio', ['Nacional', 'Europea', 'Internacional']);
            $table->string('Idioma', 255);
        });

        // Taula INVESTIGADORS
        Schema::create('INVESTIGADORS', function (Blueprint $table) {
            $table->char('Passaport', 9)->primary();
            $table->string('CodiAssegMèdica', 255);
            $table->string('NomCognoms', 255);
            $table->string('Especialitat', 255);
            $table->string('Telefon', 20);
            $table->string('Adreça', 255);
            $table->string('Ciutat', 255);
            $table->string('País', 255);
            $table->string('Email', 255)->unique();
            $table->enum('Titulacio', ['Doctor', 'Master', 'Grau', 'Estudiant', 'Altres']);
        });

        // Taula PARTICIPA
        Schema::create('PARTICIPA', function (Blueprint $table) {
            $table->char('Passaport', 9);
            $table->char('CodiProj', 6);
            $table->date('DataInici');
            $table->date('DataFinal');
            $table->decimal('Retribucio', 10, 2);
            $table->enum('ParticipacioProrrogable', ['Sí', 'No']);
            $table->enum('ParticipacioPublicacio', ['Sí', 'No']);
            $table->primary(['Passaport', 'CodiProj']);
            $table->foreign('Passaport')->references('Passaport')->on('INVESTIGADORS');
            $table->foreign('CodiProj')->references('CodiProj')->on('PROJECTES');
        });

        // Taula USUARIS
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->enum('Tipus', ['gestor', 'director']);
            $table->dateTime('DarreraHoraEntrada')->nullable();
            $table->dateTime('DarreraHoraSortida')->nullable();
        
        });

        DB::table('users')->insert([
            [
                'name' => 'hola',
                'email' => 'hola@example.com',
                'password' => Hash::make('12345678'),
                'Tipus' => 'gestor',
                'DarreraHoraEntrada' => '2023-05-16 09:00:00',
                'DarreraHoraSortida' => '2023-05-16 18:00:00'
            ],
            [
                'name' => 'adeu',
                'email' => 'adeu@example.com',
                'password' => Hash::make('12345678'),
                'Tipus' => 'director',
                'DarreraHoraEntrada' => '2023-05-18 09:00:00',
                'DarreraHoraSortida' => '2023-05-18 18:00:00'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar taules en ordre invers
        Schema::dropIfExists('users');
        Schema::dropIfExists('PARTICIPA');
        Schema::dropIfExists('INVESTUGADORS');
        Schema::dropIfExists('PROJECTES');
    }
}
