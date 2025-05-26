<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Distributer;

class DistributerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Distributer::all();
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
                'user_name' => 'required|string|max:255',
                'first_name' => 'required|string|max:255',
                'second_name' => 'required|string|max:255',
                'three_name' => 'required|string|max:255',
                'birth_date' => 'required|date',
                'phone_number' => 'required|string|max:20',
                'email' => 'required|email|unique:distributers,email',
                'password' => 'required|string|min:8',
                'chef_id' => 'required|exists:chefs,chef_id',
                'vehicle_id' => 'required|exists:vehicles,vehicle_id',
            ]);
    
            $distributer = Distributer::create($request->all());
    
            return response()->json($distributer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $distributer = Distributer::findOrFail($id);
        return response()->json($distributer,200);
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
        $distributer =Distributer::findOrFail($id);
        $validated=$request->validate([
                'user_name' => 'required|string|max:255',
                'first_name' => 'required|string|max:255',
                'second_name' => 'required|string|max:255',
                'three_name' => 'required|string|max:255',
                'birth_date' => 'required|date',
                'phone_number' => 'required|string|max:20',
                'email' => 'required|email|unique:distributers,email,'.$distributer->distributer_id.',distributer_id',
                'password' => 'required|string|min:8',
                'chef_id' => 'required|exists:chefs,chef_id',
                'vehicle_id' => 'required|exists:vehicles,vehicle_id',
        ]);

        $distributer->update($request->only([
            'user_name',
            'first_name',
            'second_name' ,
            'three_name',
            'birth_date',
            'phone_number' ,
            'email' ,
            'password',
            'chef_id' ,
            'vehicle_id'

        ]));
        return response()->json($distributer, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $distributer=Distributer::findOrFail($id)->delete();
        // $distributer->delete();
        return response()->json(null, Response::HTTP_OK);
    }
}
