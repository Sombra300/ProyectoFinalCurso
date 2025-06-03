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
        Schema::create('weapons', function (Blueprint $table) {
            $table->id()->autoincrement();//autoincrements
            $table->foreignId('item_id')->onDelete('cascade');
            $table->string('tipoDaño');
            $table->enum('rol',['member', 'admin'])->default('member');
            $table->integer('daño');
            $table->integer('alcanceNormal');
            $table->integer('alcanceExtra');
            $table->string('tipoArma');
            $table->enum('rol',['member', 'admin'])->default('member');
            $table->boolean('propSut')->nullable();
            $table->boolean('prop2Manos')->nullable();
            $table->boolean('propPesada')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weapons');
    }
};
