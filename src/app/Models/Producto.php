<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'stock',
        'idCategoria'
    ];

    //Relación con categoria 1:N
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }

    ///Relación con proveedores N:M
    public function proveedores()
    {
        return $this->belongsToMany(Proveedor::class, 'producto_proveedor');
    }

}
