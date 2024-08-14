<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Ingredients::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message' => 'Create Not requier']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ingredients' => 'required|string|max:255',
        ]);
        $ingredient=Ingredients::create($request->all());
        return response()->json($ingredient,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ingredient=Ingredients::where('ingredients_id',$id)->first();
        if(!$ingredient){
            return response()->json(['message'=> 'Not Found'],404);
        }
        return response()->json($ingredient,200);   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->json(['message' => 'Create Not requier']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ingredient=Ingredients::find($id);
        if(!$ingredient){
            return response()->json(['message'=> 'Not found'],404);
        }
        $ingredient->update($request->all());
        return response()->json($ingredient,200);   
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ingredient=Ingredients::find($id);
        if(!$ingredient){
            return response()->json(['message'=> ''],404);
        }
        $ingredient->delete();
        return response()->json($ingredient,200);   
    }
}
