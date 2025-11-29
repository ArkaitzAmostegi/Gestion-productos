<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductoProveedor extends Model
{
    // Indica que este modelo NO usa timestamps porque la tabla pivot no los tiene
    public $timestamps = false;

    // Relación N:1 → cada fila pivot pertenece a un producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    // Relación N:1 → cada fila pivot pertenece a un proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
