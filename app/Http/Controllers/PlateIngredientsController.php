<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlateIngredientsResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\PlateIngredients;

class PlateIngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plateIngredients= PlateIngredients::all();
        return PlateIngredientsResource::collection($plateIngredients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message' => 'Not using in API'], Response::HTTP_METHOD_NOT_ALLOWED);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'plate_ingredients' => 'required|array',
            'plate_ingredients.*.ingredients_id' => 'required|exists:ingredients,ingredients_id',
            'plate_ingredients.*.plate_id' => 'required|exists:plates,plate_id',
        ]);

        $plateIngredients = [];

        foreach ($request->plate_ingredients as $ingredient) {
            $plateIngredients[] = PlateIngredients::create($ingredient);
        }

        return response()->json($plateIngredients, 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $plateIngredient = PlateIngredients::findOrFail($id);
        return response()->json($plateIngredient, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->json(['message' => 'Not using in API'], Response::HTTP_METHOD_NOT_ALLOWED);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $plateIngredient = PlateIngredients::findOrFail($id);
        $validated = $request->validate([
            'ingredients_id' => 'required|exists:ingredients,ingredients_id',
            'plate_id' => 'required|exists:plates,plate_id',
        ]);

        $plateIngredient->update($request->only([
            'ingredients_id',
            'plate_id',
        ]));

        return response()->json($plateIngredient, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plateIngredient = PlateIngredients::findOrFail($id)->delete();
        return response()->json(null, Response::HTTP_OK);
    }
}
