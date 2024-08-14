<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicles=[
            'دراجة هوائية',
            'دراجة كهربائية',
            'موتور',
            'سيارة',
        ];

        foreach ($vehicles as $vehicle) {
            DB::table('vehicles')->insert([
                'vehicle' => $vehicle
            ]);
        }
    }
}
