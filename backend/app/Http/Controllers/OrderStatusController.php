<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderStatusResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\OrderStatus;

class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all order statuses
        $orderStatuses = OrderStatus::all();
        return OrderStatusResource::collection($orderStatuses);
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
            'status' => 'required|string|max:255',
        ]);

        $orderStatus = OrderStatus::create($request->all());

        return response()->json($orderStatus, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orderStatus = OrderStatus::findOrFail($id);
        return new OrderStatusResource($orderStatus);
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
        $orderStatus = OrderStatus::findOrFail($id);
        $validated = $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $orderStatus->update($request->only(['status']));

        return response()->json($orderStatus, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orderStatus = OrderStatus::findOrFail($id);
        $deleted = $orderStatus->toArray();
        $orderStatus->delete();
        return response()->json($deleted, Response::HTTP_OK);
    }
}
