<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Type::all();
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
            'type' => 'required|string|max:255',
        ]);

        $type = Type::create($request->all());
        return response()->json($type, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $type = Type::where('type_id', $id)->first();

        if (!$type) {
            response()->json(['message' => 'type Not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($type);
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
        $type = Type::where('type_id', $id)->first();
        


        if (!$type) {
            response()->json(['message' => 'Type Not Found'], Response::HTTP_NOT_FOUND);
        }

        $request->validate([
            'type' => 'required|string|max:255',
        ]);

        $type->update($request->all());

        return response()->json($type, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = Type::find($id);
        if (!$type) {
            response()->json(['message' => ''], Response::HTTP_NOT_FOUND);
        }
        $type->delete();

        return response()->json(['message' => 'Type Deleted'], Response::HTTP_OK);
    }
}
