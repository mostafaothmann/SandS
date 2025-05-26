<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Chef;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Order;
use App\Models\Plate;
use Illuminate\Support\Facades\DB;


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

    public function getCommentsByPlate($plateId)
    {
        $plate = Plate::find($plateId);

        if (!$plate) {
            return response()->json(['message' => 'Plate not found'], 404);
        }

        // Get all orders associated with the plate
        $orders = $plate->order;

        // Collect all comments from the orders
        $comments = $orders->map(function($order) {
            return $order->comment;
        });

        return response()->json($comments);
    }
    public function averageRating($plateId)
    {
       
        $averageRating = Order::where('plate_id', $plateId)
            ->whereNotNull('rate')
            ->avg('rate');


        $plate = Plate::find($plateId);
        $plateName = $plate ? $plate->plate_name : 'Unknown Plate';

        return response()->json([
            'plate_id' => $plateId,
            'plate_name' => $plateName,
            'average_rating' => $averageRating
        ]);
    }
    public function topRatedPlates()
    {

        $topPlates = DB::table('orders')
            ->select('plate_id')
            ->avg('rate')
            ->groupBy('plate_id')
            ->orderBy('average_rating', 'desc')
            ->limit(8)
            ->get();


        $plates = Plate::whereIn('plate_id', $topPlates->pluck('plate_id'))
            ->get()
            ->keyBy('plate_id');


        $result = $topPlates->map(function ($item) use ($plates) {
            $plate = $plates->get($item->plate_id);
            return [
                'plate_id' => $item->plate_id,
                'plate_name' => $plate ? $plate->plate_name : 'Unknown Plate',
                'average_rating' => $item->average_rating
            ];
        });

        return response()->json($result);
    }

    public function topRatedChefs()
    {
        $topChefs = Chef::select('chefs.chef_id', 'chefs.first_name', 'chefs.second_name', 'chefs.three_name', DB::raw('SUM(orders.rate) as total_rating'))
            ->join('plates', 'chefs.chef_id', '=', 'plates.chef_id')
            ->join('orders', 'plates.plate_id', '=', 'orders.plate_id')
            ->whereNotNull('orders.rate')
            ->groupBy('chefs.chef_id', 'chefs.first_name', 'chefs.second_name', 'chefs.three_name')
            ->orderBy('total_rating', 'desc')
            ->limit(8)
            ->get();

        $result = $topChefs->map(function ($chef) {
            $chef = Chef::where('chef_id', $chef->chef_id)->first();
            return [
                'chef_id' => $chef->chef_id,
                'full_name' => $chef->first_name . ' ' . $chef->second_name . ' ' . $chef->three_name,
                'total_rating' => $chef->total_rating,
                'state'=> $chef->state->state

            ];
        });

        return response()->json([
            'chefs' => $result
        ]);
    }
}
