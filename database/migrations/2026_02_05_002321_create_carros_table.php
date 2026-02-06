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
        Schema::create('carros', function (Blueprint $table) {
            $table->id('id');
            $table->string('modelo');
            $table->string('marca');
            $table->year('ano');
            $table->decimal('preco_diaria');
            $table->text('descricao')->nullable();
            $table->enum('status', ['disponível', 'indisponível'])->default('disponível');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carros');
    }
};
