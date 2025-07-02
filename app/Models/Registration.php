<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'documento',
        'telefono',
        'email',
        'fecha_nacimiento',
        'edad',
        'genero',
        'category_id',
        'talla',
        'precio',
        'pagado',
        'referencia_pago',
    ];

    /**
     * A registration belongs to a category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
