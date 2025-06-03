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
        Schema::create('armors', function (Blueprint $table) {
            $table->id()->autoincrement();//autoincrements
            $table->foreignId('item_id')->onDelete('cascade');
            $table->enum('tipoArm',['ligera', 'media', 'pesada', 'escudo'])->default('ligera');;
            $table->boolean('desSig');
            $table->integer('CA');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armors');
    }
};
