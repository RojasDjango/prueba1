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
        Schema::create('provincias', function (Blueprint $table) {
            $table->id();
            $table->string('name');
             //mas limpio esta opcion 
            $table->foreignId('departamento_id')->constrained();



            // $table->unsignedBigInteger('departamento_id');
            // $table->foreign('departamento_id')->references('id')->on('departamentos')->constrained();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provincias');
    }
};
