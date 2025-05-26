<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChefResource;
use Illuminate\Http\Request;
use App\Models\Chef;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class ChefController extends Controller
{
    public function index()
    {
        $chefs = Chef::all();
        return ChefResource::collection($chefs);
    }

    public function create()
    {
        return response()->json(['message' => 'Not using in API'], Response::HTTP_METHOD_NOT_ALLOWED);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'three_name' => 'required|string|max:255',
            'image_path' => 'required|string|max:255',
            'email' => 'required|email|unique:chefs,email',
            'password' => 'required|string|min:6',
            'birth_date' => 'required|date',
            'mobile_number' => 'required|string|max:20',
            'cv_path' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'state_id' => 'required|exists:states,state_id',
        ]);


        $chef = Chef::create($validated);


        return response()->json($chef, Response::HTTP_OK);
    }

    public function show(string $id)
    {

        // $chef = Chef::where('chef_id', $id)->first();
        $chef = Chef::findOrFail($id);
        return new ChefResource($chef);
    }

    public function edit(string $id)
    {
        return response()->json(['message' => 'Not using in API'], Response::HTTP_METHOD_NOT_ALLOWED);
    }


    public function update(Request $request, string $id)
    {
        $chef= Chef::findOrFail($id);
        $request->validate([
            'user_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'three_name' => 'required|string|max:255',
            'image_path' => 'required|string|max:255',
            'email' => 'required|email|unique:chefs,email,' . $chef->chef_id . ',chef_id',
            'password' => 'required|string|min:6',
            'birth_date' => 'required|date',
            'mobile_number' => 'required|string|max:20',
            'cv_path' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'state_id' => 'required|exists:states,state_id',
        ]);
        $chef->update($request->only([
            'user_name',
            'first_name',
            'second_name',
            'three_name',
            'image_path',
            'email',
            'password',
            'birth_date',
            'mobile_number',
            'cv_path',
            'location',
            'state_id'
        ]));
        return response()->json($chef, Response::HTTP_OK);
    }

    public function destroy(string $id)
    {
        $chef = Chef::findOrFail($id);
        $chef->delete();
        return response()->json(null, 204);
    }

    public function login(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $chef = Chef::findOrFail( $request->username );

        if (!$chef || !Hash::check($request->password, $chef->password)) {

            $token = JWTAuth::fromUser($chef);

            return response()->json(['token' => $token]);
        }


        return response()->json(['error' => $chef], 401);
    }
}
