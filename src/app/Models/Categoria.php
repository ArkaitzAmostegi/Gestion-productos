<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    // Define los campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    /**
     * Get the products for the category.
     * Define la relación uno-a-muchos (1:N): Una categoría tiene muchos productos.
     */

    public function productos()
    {
        return $this->hasMany(Producto::class, 'idCategoria');
    }
}
