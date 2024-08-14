<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubTypeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\SubType;

class SubTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all sub_types with their associated type
        $subTypes = SubType::with('type')->get();
        return SubTypeResource::collection($subTypes);
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
            'sub_type' => 'required|string|max:255',
            'type_id' => 'required|exists:types,type_id',
        ]);

        $subType = SubType::create($request->all());

        return response()->json($subType, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subType = SubType::with('type')->findOrFail($id);
        return new SubTypeResource($subType);
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
        $subType = SubType::findOrFail($id);
        $validated = $request->validate([
            'sub_type' => 'required|string|max:255',
            'type_id' => 'required|exists:types,type_id',
        ]);

        $subType->update($request->only([
            'sub_type',
            'type_id',
        ]));

        return response()->json($subType, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subType = SubType::findOrFail($id);
        $deleted = $subType->toArray();
        $subType->delete();
        return response()->json($deleted, Response::HTTP_OK);
    }
}
