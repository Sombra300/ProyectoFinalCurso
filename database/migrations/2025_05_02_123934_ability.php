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
         Schema::create('abilities', function (Blueprint $table) {
            $table->id()->autoincrement();//autoincrements
            $table->string('nombre',100)->unique();//cadena longitud 30
            $table->string('coste',100);//cadena longitud 100
            $table->string('reuseTime');//text
            $table->string('descripcion');//text
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abilities');
    }
};
