<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perfiles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');         
            $table->string('nickname')->nullable();
            $table->integer('edad')->nullable();
            $table->string('email')->unique();
            $table->string('telefono')->nullable();

            // --- CLAVE FORÁNEA (Foreign Key) ÚNICA para 1:1 ---
            // Relación 1:1 con usuarios
            $table->foreignId('usuario_id')->constrained('usuarios')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfiles');
    }
};
