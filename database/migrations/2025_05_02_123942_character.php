<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id()->autoincrement();//autoincrements
            $table->string('nombre',30);//cadena longitud 30
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('race_id')->constrained()->onDelete('cascade');
            $table->foreignId('subrace_id')->nullable()->constrained('sub_races')->nullOnDelete();
            $table->foreignId('background_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('vida');
            $table->integer('vidaMax');
            $table->integer('vidaTemp')->nullable();
            $table->integer('CA');
            $table->integer('velocidad');
            $table->integer('FUE');
            $table->integer('ModFUE');
            $table->integer('DES');
            $table->integer('ModDES');
            $table->integer('CON');
            $table->integer('ModCON');
            $table->integer('INT');
            $table->integer('ModINT');
            $table->integer('SAB');
            $table->integer('ModSAB');
            $table->integer('CAR');
            $table->integer('ModCAR');
            $table->boolean('SalvFUE')->nullable();
            $table->boolean('SalvDES')->nullable();
            $table->boolean('SalvCON')->nullable();
            $table->boolean('SalvINT')->nullable();
            $table->boolean('SalvSAB')->nullable();
            $table->boolean('SalvCAR')->nullable();
            $table->boolean('CompAcrobacias')->nullable();
            $table->boolean('CompAtletismo')->nullable();
            $table->boolean('CompConocimArcano')->nullable();
            $table->boolean('CompEngaño')->nullable();
            $table->boolean('CompHistoria')->nullable();
            $table->boolean('CompInterpretacion')->nullable();
            $table->boolean('CompIntimidacion')->nullable();
            $table->boolean('CompInvestigacion')->nullable();
            $table->boolean('CompJuegoManos')->nullable();
            $table->boolean('CompMedicina')->nullable();
            $table->boolean('CompNaturaleza')->nullable();
            $table->boolean('CompPercepcion')->nullable();
            $table->boolean('CompPerspicacia')->nullable();
            $table->boolean('CompPersuasion')->nullable();
            $table->boolean('CompReligion')->nullable();
            $table->boolean('CompSigilo')->nullable();
            $table->boolean('CompSupervivencia')->nullable();
            $table->boolean('CompTratoAnimales')->nullable();
            $table->string('historiaPersonaje')->nullable();
            $table->string('rasgosPersonaje')->nullable();
            $table->string('idealesPersonaje')->nullable();
            $table->string('vinculosPersonaje')->nullable();
            $table->string('defectosPersonaje')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }


};
