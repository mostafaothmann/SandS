<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DistributerController;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\PlateController;
use App\Http\Controllers\PlateIngredientsController;
use App\Http\Controllers\PricesController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\SubTypeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\VehicleController;
use App\Http\Resources\PricesResource;
use App\Models\Ingredients;
use App\Models\Plate;
use App\Models\SubType;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Vehicl
Route::get('/vehicles', [VehicleController::class, 'index']);
Route::post('/vehicles', [VehicleController::class, 'store']);
Route::get('/vehicles/{id}', [VehicleController::class, 'show']);
Route::put('/vehicles/{id}', [VehicleController::class, 'update']);
Route::delete('/vehicles/{id}', [VehicleController::class, 'destroy']);

// Type
Route::get('/type', [TypeController::class,'index']);
Route::post('/type', [TypeController::class,'store']);
Route::get('/type/{id}', [TypeController::class,'show']);
Route::put('/type/{id}', [TypeController::class, 'update']);
Route::delete('/type/{id}', [TypeController::class, 'destroy']);

//Ingredients
Route::get('/Ingredients',[IngredientsController::class,'index']);
Route::post('/Ingredients',[IngredientsController::class,'store']);
Route::put('/Ingredients/{id}',[IngredientsController::class,'update']);
Route::get('/Ingredients/{id}',[IngredientsController::class,'show']);
Route::delete('/Ingredients/{id}',[IngredientsController::class,'destroy']);

// state
Route::get('/State',[StateController::class,'index']);
Route::get('/State/{id}',[StateController::class,'show']);

// Chef
Route::get('/chefs', [ChefController::class, 'index']);
Route::post('/chefs', [ChefController::class, 'store']);
Route::get('/chefs/{id}', [ChefController::class, 'show']);
Route::put('/chefs/{id}', [ChefController::class, 'update']);
Route::delete('/chefs/{id}', [ChefController::class, 'destroy']);

//Distributer
Route::get('/distributer', [DistributerController::class, 'index']);
Route::post('/distributer', [DistributerController::class, 'store']);
Route::get('/distributer/{id}', [DistributerController::class, 'show']);
Route::put('/distributer/{id}', [DistributerController::class, 'update']);
Route::delete('/distributer/{id}', [DistributerController::class, 'destroy']);

//Client
Route::get('/client', [ClientController::class, 'index']);
Route::post('/client', [ClientController::class, 'store']);
Route::get('/client/{id}', [ClientController::class, 'show']);
Route::put('/client/{id}', [ClientController::class, 'update']);
Route::delete('/client/{id}', [ClientController::class, 'destroy']);

//Plate
Route::get('/plate', [PlateController::class, 'index']);
Route::post('/plate', [PlateController::class, 'store']);
Route::get('/plate/{id}', [PlateController::class, 'show']);
Route::put('/plate/{id}', [PlateController::class, 'update']);
Route::delete('/plate/{id}', [PlateController::class, 'destroy']);

//Plate
Route::get('/price', [PricesController::class, 'index']);
Route::post('/price', [PricesController::class, 'store']);
Route::get('/price/{id}', [PricesController::class, 'show']);
Route::put('/price/{id}', [PricesController::class, 'update']);
Route::delete('/price/{id}', [PricesController::class, 'destroy']);
Route::get('plates/{plate_id}/prices', [PricesController::class, 'getPricesByPlateId']);

//SUB_TYPE
Route::get('/subtype', [SubTypeController::class, 'index']);
Route::post('/subtype', [SubTypeController::class, 'store']);
Route::get('/subtype/{id}', [SubTypeController::class, 'show']);
Route::put('/subtype/{id}', [SubTypeController::class, 'update']);
Route::delete('/subtype/{id}', [SubTypeController::class, 'destroy']);

//Status
Route::get('/status', [OrderStatusController::class, 'index']);
Route::post('/status', [OrderStatusController::class, 'store']);
Route::get('/status/{id}', [OrderStatusController::class, 'show']);
Route::put('/status/{id}', [OrderStatusController::class, 'update']);
Route::delete('/status/{id}', [OrderStatusController::class, 'destroy']);

//Plate_Ingredients
Route::get('/plateIngredients', [PlateIngredientsController::class, 'index']);
Route::post('/plateIngredients', [PlateIngredientsController::class, 'store']);
Route::get('/plateIngredients/{id}', [PlateIngredientsController::class, 'show']);
Route::put('/plateIngredients/{id}', [PlateIngredientsController::class, 'update']);
Route::delete('/plateIngredients/{id}', [PlateIngredientsController::class, 'destroy']);

//Oreder
Route::get('/order', [OrderController::class, 'index']);
Route::post('/order', [OrderController::class, 'store']);
Route::get('/order/{id}', [OrderController::class, 'show']);
Route::put('/order/{id}', [OrderController::class, 'update']);
Route::delete('/order/{id}', [OrderController::class, 'destroy']);






// Route::middleware('auth:sanctum')->group(function () {
  
// });