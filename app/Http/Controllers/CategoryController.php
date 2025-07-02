<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Listar todas las categorías.
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json(['data' => $categories], 200);
    }

    /**
     * Crear una nueva categoría.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'      => 'required|string|max:255|unique:categories,nombre',
            'descripcion' => 'nullable|string',
            'min_age'     => 'required|integer|min:0',
            'max_age'     => 'required|integer|gte:min_age',
            'distancia'   => 'required|string',
            'premios'     => 'nullable|string',
            'gender'      => 'required|in:masculino,femenino,ambos',
        ]);

        $category = Category::create($validated);

        return response()->json(['data' => $category], 201);
    }

    /**
     * Mostrar una categoría específica.
     */
    public function show($id)
    {
        $category = Category::find($id);

        if (! $category) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }

        return response()->json(['data' => $category], 200);
    }

    /**
     * Actualizar categoría existente.
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if (! $category) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }

        $validated = $request->validate([
            'nombre'      => "required|string|max:255|unique:categories,nombre,{$id}",
            'descripcion' => 'nullable|string',
            'min_age'     => 'required|integer|min:0',
            'max_age'     => 'required|integer|gte:min_age',
            'distancia'   => 'required|string',
            'premios'     => 'nullable|string',
            'gender'      => 'required|in:masculino,femenino,ambos',
        ]);

        $category->update($validated);

        return response()->json(['data' => $category], 200);
    }

    /**
     * Eliminar una categoría.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (! $category) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }

        $category->delete();
        return response()->json(['data' => 'Categoría eliminada correctamente'], 200);
    }
}
