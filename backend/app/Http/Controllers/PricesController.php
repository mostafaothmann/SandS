<?php

namespace App\Http\Controllers;

use App\Http\Resources\PricesResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Resources;
use App\Models\Prices;

class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $prices = Prices::all();
        return PricesResource::collection($prices);
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
            'person_number' => 'required|integer',
            'price' => 'required|numeric|between:0,999999.99',
            'discount' => 'nullable|integer',
            'plate_id' => 'required|exists:plates,plate_id',
        ]);

        $price = Prices::create($request->all());

        return response()->json($price, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $price = Prices::findOrFail($id);
        return new PricesResource($price);
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
        $price = Prices::findOrFail($id);
        $validated = $request->validate([
            'person_number' => 'required|integer',
            'price' => 'required|numeric|between:0,999999.99',
            'discount' => 'nullable|integer',
            'plate_id' => 'required|exists:plates,plate_id',
        ]);

        $price->update($request->only([
            'person_number',
            'price',
            'discount',
            'plate_id',
        ]));

        return response()->json($price, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $price = Prices::findOrFail($id)->delete();
        return response()->json(null, Response::HTTP_OK);
    }

    public function getPricesByPlateId($plate_id)
    {
        // استرجاع جميع الأسعار الخاصة بالطبق
        $prices = Prices::where('plate_id', $plate_id)->get();

        // التحقق مما إذا كان هناك أي أسعار
        if ($prices->isEmpty()) {
            return response()->json(['message' => 'No prices found for this plate.'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($prices, Response::HTTP_OK);
    }
}
