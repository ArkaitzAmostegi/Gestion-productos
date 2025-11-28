<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Proveedor extends Model
{
     use HasFactory; 
    
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_proveedor');
    }
}
