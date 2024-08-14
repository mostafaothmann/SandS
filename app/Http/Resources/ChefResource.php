<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChefResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = $request->user();

        // إذا كان المستخدم هو admin، قم بإرجاع جميع البيانات
        if ($user && $user->is_admin) {
            return [
                'chef_id' => $this->chef_id,
                'user_name' => $this->user_name,
                'full_name' => $this->first_name . ' ' . $this->second_name . ' ' . $this->three_name,
                'email' => $this->email,
                'birth_date' => $this->birth_date->format('Y-m-d'),
                'mobile_number' => $this->mobile_number,
                'location' => $this->location,
                'state' => $this->state->name,
                'image_path' => $this->image_path,
                'cv_path' => $this->cv_path,
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            ];
        }
        
        return [
            'chef_id' => $this->chef_id,
            'user_name' => $this->user_name,
            'full_name' => $this->first_name . ' ' . $this->second_name . ' ' . $this->three_name,
            // 'email' => $this->email,
            // 'birth_date' => $this->birth_date->format('Y-m-d'),
            // 'mobile_number' => $this->mobile_number,
            'location' => $this->location,
            'state' => $this->state->name, // إذا كنت ترغب في تضمين اسم الولاية بدلاً من ID
            'image_path' => $this->image_path,
            // 'cv_path' => $this->cv_path,
            // 'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            // 'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
