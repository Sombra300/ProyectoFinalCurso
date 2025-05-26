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
        Schema::create('character_clase', function (Blueprint $table) {
            $table->foreignId('character_id')->constrained()->onDelete('cascade');
            $table->foreignId('clase_id')->constrained()->onDelete('cascade');
            $table->foreignId('sub_clase_id')->nullable()->constrained('sub_clases')->nullOnDelete();
            $table->integer('lvl')->default(1);
            $table->integer('modComp');
            $table->unique(['character_id', 'clase_id']);
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
