<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'min_age',
        'max_age',
        'distancia',
        'premios',
        'gender',
    ];

    /**
     * A category has many registrations.
     */
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
