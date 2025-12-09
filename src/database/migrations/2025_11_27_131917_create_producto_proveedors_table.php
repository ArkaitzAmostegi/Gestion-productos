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

            // No se requiere una columna 'id' si solo es una tabla pivote simple.

            // Clave Foránea de Producto
            $table->foreignId('producto_id')->constrained()->cascadeOnDelete();
            // Clave Foránea de Proveedor
            $table->foreignId('proveedor_id')->constrained()->cascadeOnDelete();

            // Establece que la combinación de ambas claves debe ser única.
            $table->primary(['producto_id', 'proveedor_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_proveedor');
    }
};
