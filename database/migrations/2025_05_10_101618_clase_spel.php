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
        Schema::create('clase_spel', function (Blueprint $table){
            $table->foreignId('clase_id')->constrained()->onDelete('cascade');
            $table->foreignId('spel_id')->constrained()->onDelete('cascade');
            $table->unique(['clase_id', 'spel_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clase_spel');
    }
};
