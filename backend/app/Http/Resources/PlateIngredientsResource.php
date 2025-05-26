<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlateIngredientsResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {
        return [
            'ingredients_id' => $this->ingredients_id,
            'ingredient_name' => $this->ingredients->ingredients,
            'plate_id' => $this->plate_id,
            'plate_name' => $this->plate->plate_name, 
        ];
    }
}
