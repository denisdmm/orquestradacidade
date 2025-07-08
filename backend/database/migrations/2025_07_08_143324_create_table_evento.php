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
        Schema::create('table_evento', function (Blueprint $table) {
            $table->id();
			$table->string('nome_evento', 100);
			$table->string('descricao_evento', 255)->nullable();
			$table->dateTime('data_evento');
			$table->string('local_evento', 100)->nullable();
			$table->string('traje_evento', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_evento');
    }
};
