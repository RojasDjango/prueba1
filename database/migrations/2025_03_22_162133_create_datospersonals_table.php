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
        Schema::create('datospersonals', function (Blueprint $table) {
            $table->id();
            
            // $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->unique()->onDelete('cascade');
            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->unsignedBigInteger('provincia_id');
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->unsignedBigInteger('distrito_id');
            $table->foreign('distrito_id')->references('id')->on('distritos');
            // $table->string('distrito');
            $table->string('namedireccion');
            $table->string('facebook');
            $table->string('tiktok');
            $table->string('youtube');
            $table->string('x');
            $table->string('kick');
            // $table->unsignedBigInteger('listarole_id');
            // $table->foreign('listarole_id')->references('id')->on('listaroles');
            $table->unsignedBigInteger('sector_id');
            $table->foreign('sector_id')->references('id')->on('sectors');
            $table->unsignedBigInteger('ejecutora_id');
            $table->foreign('ejecutora_id')->references('id')->on('ejecutoras');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datospersonals');
    }
};
