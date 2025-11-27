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
        Schema::create('producto_proveedors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

             // Relación con cproveedor 
           $table->foreignId('idCategoria')
                ->constrained('categorias')
                ->restrictOnDelete(); 
            
                 // Relación con producto
           $table->foreignId('idCategoria')
                ->constrained('categorias')
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
