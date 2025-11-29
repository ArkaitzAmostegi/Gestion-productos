<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proveedor extends Model
{
    use HasFactory;

    // Campos que se pueden asignar de forma masiva desde formularios
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
    ];

    // Relación N:M → un proveedor puede suministrar muchos productos
    // Usa la tabla pivot producto_proveedor
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_proveedor');
    }
}
