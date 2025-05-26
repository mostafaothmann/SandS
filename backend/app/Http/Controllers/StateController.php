<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\State;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return State::all();
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
        return response()->json(['message' => 'Not using'], Response::HTTP_METHOD_NOT_ALLOWED);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $state = State::where('state_id', $id)->first();

        if (!$state) {
            response()->json(['message' => 'State Not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($state);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->json(['message' => 'Not using In aPi'], Response::HTTP_METHOD_NOT_ALLOWED);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return response()->json(['message' => 'Not using '], Response::HTTP_METHOD_NOT_ALLOWED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json(['message' => 'Not using '], Response::HTTP_METHOD_NOT_ALLOWED);
    }
}
