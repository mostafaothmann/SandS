<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "sub_type_id"=> $this->sub_type_id,
            "sub_type"=> $this->sub_type,
            "type_name"=>$this->type->type,
        ];
    }
}
