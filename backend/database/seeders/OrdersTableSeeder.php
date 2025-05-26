<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'note' => 'يرجى التوصيل بسرعة.',
                'comment' => 'الطبق لذيذ جداً.',
                'rate' => 5,
                'client_id' => 2,
                'plate_id' => 2,
                'distributer_id' => 4,
                'price_id' => 1,
                'status_id' => 1,
            ],
            [
                'note' => 'يرجى عدم إضافة الكثير من الملح.',
                'comment' => 'الطلب وصل بسرعة.',
                'rate' => 4,
                'client_id' => 3,
                'plate_id' => 3,
                'distributer_id' => 5,
                'price_id' => 3,
                'status_id' => 2,
            ],
            [
                'note' => 'يرجى توصيله في الوقت المحدد.',
                'comment' => 'الطبق كان معتدلاً.',
                'rate' => 3,
                'client_id' => 2,
                'plate_id' => 4,
                'distributer_id' => 4,
                'price_id' => 4,
                'status_id' => 3,
            ],
            [
                'note' => 'أود أن أشكر الطاهي.',
                'comment' => 'الطبق كان ممتاز.',
                'rate' => 5,
                'client_id' => 3,
                'plate_id' => 2,
                'distributer_id' => 5,
                'price_id' => 1,
                'status_id' => 4,
            ],
            [
                'note' => 'يرجى عدم التوصيل في وقت متأخر.',
                'comment' => 'التجربة كانت رائعة.',
                'rate' => 4,
                'client_id' => 2,
                'plate_id' => 3,
                'distributer_id' => 4,
                'price_id' => 3,
                'status_id' => 1,
            ],
            [
                'note' => 'أريد الطبق بدون ملح.',
                'comment' => 'الطبق كان جيداً.',
                'rate' => 3,
                'client_id' => 3,
                'plate_id' => 4,
                'distributer_id' => 5,
                'price_id' => 4,
                'status_id' => 2,
            ],
            [
                'note' => 'الطلب كان بارداً.',
                'comment' => 'الطبق كان بارداً عند وصوله.',
                'rate' => 2,
                'client_id' => 2,
                'plate_id' => 2,
                'distributer_id' => 4,
                'price_id' => 1,
                'status_id' => 3,
            ],
            [
                'note' => 'يرجى تسليم الطلب قبل الساعة 8 مساءً.',
                'comment' => 'الطلب كان ممتاز.',
                'rate' => 5,
                'client_id' => 3,
                'plate_id' => 3,
                'distributer_id' => 5,
                'price_id' => 3,
                'status_id' => 4,
            ],
            [
                'note' => 'يرجى عدم التأخير في التوصيل.',
                'comment' => 'الطبق كان جيداً.',
                'rate' => 3,
                'client_id' => 2,
                'plate_id' => 4,
                'distributer_id' => 4,
                'price_id' => 4,
                'status_id' => 1,
            ],
            [
                'note' => 'يرجى توصيله في الوقت المحدد.',
                'comment' => 'الطلب كان رائع.',
                'rate' => 5,
                'client_id' => 3,
                'plate_id' => 2,
                'distributer_id' => 5,
                'price_id' => 1,
                'status_id' => 2,
            ],
        ];

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
