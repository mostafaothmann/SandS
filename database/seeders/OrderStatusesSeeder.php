<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_statuses')->insert([
            ['status' => 'منتظرة'],
            ['status' => 'قيد التحضير'],
            ['status' => 'قيد التوصيل'],
            ['status' => 'منجزة'],
        ]);
    }
}
