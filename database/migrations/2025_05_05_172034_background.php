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
            $table->string('nombre',30)->unique();
            $table->string('descripcion')->nullable();
            $table->boolean('CompArmaSimple')->nullable();
            $table->boolean('CompArmaMarcial')->nullable();
            $table->boolean('CompArmaduraMed')->nullable();
            $table->boolean('CompArmaduraLig')->nullable();
            $table->boolean('CompArmaduraPes')->nullable();
            $table->boolean('CompEscudo')->nullable();
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
