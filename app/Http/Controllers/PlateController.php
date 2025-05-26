<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Plate;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Plate::all();
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
            'description' => 'required|string|max:1500',
            'photo_path' => 'required|string|max:255',
            'plate_name' => 'required|string|max:255',
            'chef_id' => 'required|exists:chefs,chef_id',
            'sub_type_id'=>'required|exists:sub_types,sub_type_id',
            'archive' => 'boolean',
        ]);

        $plate = Plate::create($request->all());

        return response()->json($plate, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $plate = Plate::findOrFail($id);
        return response()->json($plate, 200);
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
        $plate = Plate::findOrFail($id);
        $validated = $request->validate([
            'description' => 'required|string|max:1500',
            'photo_path' => 'required|string|max:255',
            'plate_name' => 'required|string|max:255',
            'chef_id' => 'required|exists:chefs,chef_id',
            'sub_type_id'=>'required|exists:sub_types,sub_type_id',
            'archive' => 'boolean',
        ]);

        $plate->update($request->only([
            'description',
            'photo_path',
            'plate_name',
            'chef_id',
            'sub_type_id',
            'archive',
        ]));

        return response()->json($plate, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plate = Plate::findOrFail($id)->delete();
        return response()->json(null, Response::HTTP_OK);
    }

    
}
