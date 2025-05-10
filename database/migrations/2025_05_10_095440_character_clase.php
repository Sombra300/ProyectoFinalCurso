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
        Schema::create('character_clase', function (Blueprint $table){
            $table->foreignId('character_id')->constrained();
            $table->foreignId('clase_id')->constrained();
            $table->unique(['character_id', 'clase_id'], 'foreign_keys');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character_clase');
    }
};
