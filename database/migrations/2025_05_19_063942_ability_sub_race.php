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
        Schema::create('ability_Sub_race', function (Blueprint $table){
            $table->foreignId('ability_id')->constrained()->onDelete('cascade');
            $table->foreignId('sub_race_id')->constrained()->onDelete('cascade');
            $table->integer('lvl');
            $table->unique(['ability_id', 'sub_race_id'], 'foreign_keys');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ability_sub_race');
    }
};
