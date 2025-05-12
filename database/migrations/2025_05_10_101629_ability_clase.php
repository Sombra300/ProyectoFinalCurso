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
        Schema::create('ability_clase', function (Blueprint $table){
            $table->foreignId('ability_id')->constrained()->onDelete('cascade');
            $table->foreignId('clase_id')->constrained()->onDelete('cascade');
            $table->unique(['ability_id', 'clase_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ability_clase');
    }
};
