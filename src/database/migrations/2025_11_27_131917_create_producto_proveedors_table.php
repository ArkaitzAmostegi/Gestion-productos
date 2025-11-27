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
        Schema::create('producto_proveedor', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // Relación con proveedor
            $table->foreignId('proveedor_id')
                ->constrained('proveedors')   // nombre REAL de la tabla
                ->restrictOnDelete();

            // Relación con producto
            $table->foreignId('producto_id')
                ->constrained('productos')    // nombre REAL de la tabla
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_proveedors');
    }
};
