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
        Schema::create('race_spel', function (Blueprint $table){
            $table->foreignId('race_id')->constrained()->onDelete('cascade');
            $table->foreignId('spel_id')->constrained()->onDelete('cascade');
            $table->unique(['race_id', 'spel_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('race_spel');
    }
};
