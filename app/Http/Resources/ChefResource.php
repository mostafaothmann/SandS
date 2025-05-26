<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ChefResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // تأكد من استخدام الحارس الصحيح عند الحصول على المستخدم
        $user = auth('admin')->user();

        // التحقق من أن المستخدم هو Admin
        $isAdmin = $user && $user->role === 'admin';

        // إنشاء المصفوفة الأساسية للبيانات المشتركة
        $data = [
            'chef_id' => $this->chef_id,
            'user_name' => $this->username,
            'full_name' => $this->first_name . ' ' . $this->second_name . ' ' . $this->three_name,
            'location' => $this->location,
            'state' => $this->state->state,
            'image_path' => $this->image_path,
        ];

        // إذا كان المستخدم Admin، أضف الحقول الإضافية
        if ($isAdmin) {
            $data['email'] = $this->email;
            $data['birth_date'] =  Carbon::parse($this->birth_date)->format('Y-m-d');
            $data['mobile_number'] = $this->mobile_number;
            $data['cv_path'] = $this->cv_path;
        }

        return $data;
    }
    }
