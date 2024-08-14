<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "note"=> $this->note,
            "comment"=>$this->comment,
            "rate" =>$this->rate,
            "client_id"=> $this->client->name,
            "plate_id"=> $this->plate->plate_name ,
            "distributer_name"=> $this->distributer->user_name,
            "Person_Number"=>$this->peices->person_number,
            "status"=> $this->orderstatus->status
        ];
    }
}
