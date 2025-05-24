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
        Schema::create('spells', function (Blueprint $table) {
            $table->id()->autoincrement();//autoincrements
            $table->string('nombre',30)->unique();
            $table->string('descripcion')->nullable();
            $table->string('coste')->nullable();
            $table->boolean('ataque')->nullable();
            $table->integer('daño');
            $table->string('tipoDaño');
            $table->integer('nivel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spells');
    }
};
