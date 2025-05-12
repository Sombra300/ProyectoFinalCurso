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
        Schema::create('character_lenguage', function (Blueprint $table){
            $table->foreignId('character_id')->constrained()->onDelete('cascade');
            $table->foreignId('lenguage_id')->constrained()->onDelete('cascade');
            $table->unique(['character_id', 'lenguage_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character_lenguage');
    }
};
