<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class productos extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'idCategoria'
    ];

    public function categoria()
    {
        return $this->belongsTo(categorias::class, 'idCategoria');
    }
}