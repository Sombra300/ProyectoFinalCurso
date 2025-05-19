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
        Schema::create('backgrounds', function (Blueprint $table) {
            $table->id()->autoincrement();//autoincrements
            $table->string('nombre',30);
            $table->string('descripcion')->nullable();
            $table->boolean('CompArmaSimple');//bool, defecto false
            $table->boolean('CompArmaMarcial');//bool, defecto false
            $table->boolean('CompArmaduraMed');//bool, defecto false
            $table->boolean('CompArmaduraLig');//bool, defecto false
            $table->boolean('CompArmaduraPes');//bool, defecto false
            $table->boolean('CompEscudo');//bool, defecto false
            $table->foreignId('lenguage_id')->nullOnDelete()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backgrounds');
    }
};
