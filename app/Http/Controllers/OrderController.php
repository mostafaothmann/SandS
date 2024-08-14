<?php
namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return OrderResource::collection($orders);
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
            'note' => 'nullable|string|max:1000',
            'comment' => 'nullable|string|max:500',
            'rate' => 'nullable|integer',
            'client_id' => 'required|exists:clients,client_id',
            'plate_id' => 'required|exists:plates,plate_id',
            'distributer_id' => 'nullable|exists:distributers,distributer_id',
            'price_id' => 'required|exists:prices,price_id',
            'status_id' => 'required|exists:order_statuses,status_id',
        ]);

        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return response()->json($order, 200);
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
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'note' => 'nullable|string|max:1000',
            'comment' => 'nullable|string|max:500',
            'rate' => 'nullable|integer',
            'client_id' => 'required|exists:clients,client_id',
            'plate_id' => 'required|exists:plates,plate_id',
            'distributer_id' => 'nullable|exists:distributers,distributer_id',
            'price_id' => 'required|exists:prices,price_id',
            'status_id' => 'required|exists:order_statuses,status_id',
        ]);

        $order->update($request->only([
            'note', 
            'comment', 
            'rate', 
            'client_id', 
            'plate_id', 
            'distributer_id', 
            'price_id', 
            'status_id'
        ]));

        return response()->json($order, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $deleted = $order->toArray();
        $order->delete();
        return response()->json($deleted, Response::HTTP_OK);
    }
}

