<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Http\Response;

class VehicleController extends Controller
{
    
    public function index()
    {
        return Vehicle::all();
    }

   
    public function create()
    {
        return response()->json(['message' => 'Create form not required for API'], Response::HTTP_METHOD_NOT_ALLOWED);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'vehicle' => 'required|string|max:255',
        ]);

        $vehicle = Vehicle::create($request->all());

        return response()->json($vehicle, Response::HTTP_CREATED);
    }

    public function show($id)
    {
       
       
        $vehicle = Vehicle::where('vehicle_id', $id)->first();;

        if (!$vehicle) {
            return response()->json(['message' => 'Vehicle not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($vehicle);
        
    }

    
    public function edit($id)
    {
        return response()->json(['message' => 'Edit form not required for API'], Response::HTTP_METHOD_NOT_ALLOWED);
    }

    public function update(Request $request, $id)
    {
      
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return response()->json(['message' => 'Vehicle not found'], Response::HTTP_NOT_FOUND);
        }

       
        $request->validate([
            'vehicle' => 'required|string|max:255',
        ]);

       
        $vehicle->update($request->all());

        return response()->json($vehicle);
    }

    
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return response()->json(['message' => 'Vehicle not found'], Response::HTTP_NOT_FOUND);
        }


        $vehicle->delete();

        return response()->json(['message' => 'Vehicle deleted successfully']);
    }
}
