<?php

// app/Http/Controllers/RegistrationController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Category;

class RegistrationController extends Controller
{
    /**
     * Almacena una nueva inscripción
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'             => 'required|string|max:255',
            'documento'          => ['required','string','regex:/^[0-9]+$/','unique:registrations'],
            'telefono'           => 'required|string|max:50',
            'email'              => 'required|string|email|max:255',
            'fecha_nacimiento'   => 'required|date',
            'edad'               => 'required|integer|min:0',
            'genero'             => 'required|string',
            'category_id'        => 'required|exists:categories,id',
            'talla'              => 'required|string|max:5',
            'precio'             => 'required|numeric|min:0',
            'pagado'             => 'boolean',
            'referencia_pago'    => 'nullable|string',
        ]);

        $category = Category::findOrFail($data['category_id']);
        if ($data['edad'] < $category->min_age || $data['edad'] > $category->max_age) {
            return response()->json(['error' => 'Edad fuera de rango para esta categoría'], 422);
        }

        $registration = Registration::create($data);
        return response()->json(['data' => $registration], 201);
    }
}
