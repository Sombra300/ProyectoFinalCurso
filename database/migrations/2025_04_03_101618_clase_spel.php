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
        Schema::create('clase_spell', function (Blueprint $table){
            $table->foreignId('clase_id')->constrained()->onDelete('cascade');
            $table->foreignId('spell_id')->constrained()->onDelete('cascade');
            $table->integer('lvl')->default(1);
            $table->unique(['clase_id', 'spell_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clase_spell');
    }
};
