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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('DNI',8)->unique();
            $table->string('name');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('email')->unique();
            $table->string('celular',9)->unique();
            // $table->string('distrito');
            // $table->string('namedireccion');
            $table->timestamp('email_verified_at')->nullable();
            // $table->string('dondelaboras');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            // $table->unsignedBigInteger('listarole_id');
            // $table->foreign('listarole_id')->references('id')->on('listaroles');
            // $table->unsignedBigInteger('departamento_id');
            // $table->foreign('departamento_id')->references('id')->on('departamentos');
            // $table->unsignedBigInteger('ejecutora_id');
            // $table->foreign('ejecutora_id')->references('id')->on('ejecutoras');
            // $table->unsignedBigInteger('provincia_id');
            // $table->foreign('provincia_id')->references('id')->on('provincias');
            // $table->unsignedBigInteger('sector_id');
            // $table->foreign('sector_id')->references('id')->on('sectors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
