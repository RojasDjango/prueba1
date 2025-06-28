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
        Schema::create('actividads', function (Blueprint $table) {
            $table->id();
            $table->enum('kick',[0,1]);
            $table->enum('facebook',[0,1]);
            $table->enum('tiktok',[0,1]);
            $table->enum('youtube',[0,1]);
            $table->enum('x',[0,1]);
            $table->enum('evento_1',[0,1]);
            $table->enum('evento_2',[0,1]);
            $table->enum('evento_3',[0,1]);
            $table->enum('evento_4',[0,1]);
            $table->enum('evento_5',[0,1]);
            // $table->enum('evento_6',[1,2]);
            // $table->enum('evento_7',[1,2]);
            // $table->enum('evento_8',[1,2]);
            // $table->enum('evento_9',[1,2]);
            // $table->enum('evento_10',[1,2]);
            $table->timestamps();
            $table->unsignedBigInteger('datospersonal_id');
            $table->foreign('datospersonal_id')->references('id')->on('datospersonals');
            // $table->unsignedBigInteger('evento_id');
            // $table->foreign('evento_id')->references('id')->on('eventos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividads');
    }
};
