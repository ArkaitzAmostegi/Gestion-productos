<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfiles'; 
    
    protected $fillable = [
        'nombre',
        'nickname',
        'edad',
        'email',
        'telefono',
        'usuario_id'
    ];

    /**
     * Get the user that owns the profile.
     * Define la relación inversa de uno-a-uno (1:1): Un perfil pertenece a un usuario.
     */
    public function usuario(): BelongsTo
    {
        // Laravel asume 'user_id' como clave foránea.
        return $this->belongsTo(Usuario::class);
    }
}
