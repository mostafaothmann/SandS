<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('types')->delete();

        $types = [
            'سوري',
            'خليجي',
            'مغربي',
            'هندي',
            'مكسيكي',
            'غربي',
        ];

        // إدخال البيانات الجديدة
        foreach ($types as $type) {
            DB::table('types')->insert([
                'type' => $type
            ]);
        }
    }
}
