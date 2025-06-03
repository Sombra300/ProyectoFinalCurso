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
        Schema::create('sub_clases', function (Blueprint $table) {
            $table->id()->autoincrement();//autoincrements
            $table->string('nombre',30)->unique();
            $table->foreignId('clase_id')->onDelete('cascade');
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subClases');
    }
};
