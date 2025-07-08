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
		Schema::create('musica_instrumento', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('musica_id');
			$table->unsignedBigInteger('instrumento_id');
			$table->timestamps();

			$table->foreign('musica_id')->references('id')->on('table_musica')->onDelete('cascade');
			$table->foreign('instrumento_id')->references('id')->on('table_instrumento')->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musica_instrumento');
    }
};
