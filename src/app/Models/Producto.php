<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    // Campos permitidos para asignación masiva desde formularios
    protected $fillable = [
        'nombre',
        'precio',
        'stock',
        'idCategoria'
    ];

    // Relación N:1 → cada producto pertenece a una categoría
    // Se indica explícitamente la FK porque no usa el nombre por defecto
    public function categoria(): BelongsTo
    {
        // Laravel asume automáticamente que la clave foránea es 'category_id'
        // y el nombre de la clave primaria es 'id'.
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }

    // Relación N:M → un producto puede tener varios proveedores
    // Usa la tabla pivot producto_proveedor
    public function proveedores()
    {
        // Laravel buscará automáticamente la tabla pivote 'producto'
        return $this->belongsToMany(Proveedor::class, 'producto_proveedor');
    }
}
