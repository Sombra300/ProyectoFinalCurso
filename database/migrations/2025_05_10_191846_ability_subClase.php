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
        Schema::create('ability_subClase', function (Blueprint $table){
            $table->foreignId('ability_id')->constrained()->onDelete('cascade');
            $table->foreignId('subClase_id')->constrained()->onDelete('cascade');
            $table->integer('lvl');
            $table->unique(['ability_id', 'subClase_id'], 'foreign_keys');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ability_subClase');
    }
};
