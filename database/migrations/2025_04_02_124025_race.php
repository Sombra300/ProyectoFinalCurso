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
        Schema::create('races', function (Blueprint $table) {
            $table->id()->autoincrement();//autoincrements
            $table->string('nombre',30)->unique();
            $table->string('descripcion')->nullable();
            $table->enum('tamaño',['pequeña', 'media', 'grande'])->default('media');
            $table->integer('velocidad')->default(30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('races');
    }
};
