<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PricesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'price_id' => $this->price_id,
            'person_number' => $this->person_number,
            'price' => $this->price,
            'discount' => $this->discount,
            'plate_name' => $this->plate->plate_name, 
        ];
    }
}
