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
        Schema::create('characters', function (Blueprint $table) {
            $table->id()->autoincrement();//autoincrements
            $table->string('nombre',30);//cadena longitud 30
            $table->foreignId('user_id')->onDelete('cascade');
            $table->foreignId('race_id')->onDelete('cascade');
            $table->integer('FUE');
            $table->integer('DES');
            $table->integer('CON');
            $table->integer('INT');
            $table->integer('SAB');
            $table->integer('CAR');
            $table->integer('lvl')->default(1);
            $table->integer('CA');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }

    
};
