<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function perfil()
    {
        /**
     * Get the profile associated with the user.
     * Define la relación uno-a-uno (1:1): Un usuario tiene un perfil.
     */
        return $this->hasOne(Perfil::class);
    }
}
