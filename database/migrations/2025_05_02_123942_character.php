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
            $table->boolean('CompSalvFUE');
            $table->boolean('CompSalvDES');
            $table->boolean('CompSalvINT');
            $table->boolean('CompSalvSAB');
            $table->boolean('CompSalvCAR');
            $table->boolean('CompAcrobacias');
            $table->boolean('CompAtletismo');
            $table->boolean('CompConocimArcano');
            $table->boolean('CompEngaño');
            $table->boolean('CompHistoria');
            $table->boolean('CompInterpretacion');
            $table->boolean('CompIntimidacion');
            $table->boolean('CompInvestigacion');
            $table->boolean('CompJuegoManos');
            $table->boolean('CompMedicina');
            $table->boolean('CompNaturaleza');
            $table->boolean('CompPercepcion');
            $table->boolean('CompPerspicacia');
            $table->boolean('CompPersuasion');
            $table->boolean('CompReligion');
            $table->boolean('CompSigilo');
            $table->boolean('CompSupervivencia');
            $table->boolean('CompTratoAnimales');
            $table->boolean('SalvFUE');
            $table->boolean('SalvDES');
            $table->boolean('SalvINT');
            $table->boolean('SalvSAB');
            $table->boolean('SalvCAR');
            $table->integer('Acrobacias');
            $table->integer('Atletismo');
            $table->integer('ConocimArcano');
            $table->integer('Engaño');
            $table->integer('Historia');
            $table->integer('Interpretacion');
            $table->integer('Intimidacion');
            $table->integer('Investigacion');
            $table->integer('JuegoManos');
            $table->integer('Medicina');
            $table->integer('Naturaleza');
            $table->integer('Percepcion');
            $table->integer('Perspicacia');
            $table->integer('Persuasion');
            $table->integer('Religion');
            $table->integer('Sigilo');
            $table->integer('Supervivencia');
            $table->integer('TratoAnimales');
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
