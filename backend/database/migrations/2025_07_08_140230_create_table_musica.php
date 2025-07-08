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
        Schema::create('table_musica', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome_musica');
            $table->string('tom_musica')->nullable();
            $table->string('andamento')->nullable();
            $table->string('compositor')->nullable();
            $table->string('arranjador')->nullable();
            $table->string('local_fisico')->nullable();
            $table->string('link_digital')->nullable();
            $table->boolean('cantanta')->default(false);
            $table->string('nome_cantanta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_musica');
    }
};
