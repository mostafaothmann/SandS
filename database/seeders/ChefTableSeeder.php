<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChefTableSeeder extends Seeder
{
   
 

    public function run(): void
    {
        DB::table('chefs')->delete();
        
        $chefs = [
            [
                'user_name' => 'Tammas',
                'first_name' => 'John',
                'second_name' => 'Doe',
                'three_name' => 'Smith',
                'image_path' => 'images/chef1.jpg',
                'email' => 'chef1@example.com',
                'password' => '123',
                'birth_date' => '1980-01-01',
                'mobile_number' => '1234567890',
                'cv_path' => 'cvs/chef1.pdf',
                'location' => 'Damascus',
                'state_id' => 1,
            ],
            [
                'user_name' => 'Hadi',
                'first_name' => 'Jane',
                'second_name' => 'Doe',
                'three_name' => 'Johnson',
                'image_path' => 'images/chef2.jpg',
                'email' => 'chef2@example.com',
                'password' => '123',
                'birth_date' => '1985-02-02',
                'mobile_number' => '0987654321',
                'cv_path' => 'cvs/chef2.pdf',
                'location' => 'Aleppo',
                'state_id' => 2,
            ],
            [
                'user_name' => 'Mostafa',
                'first_name' => 'Emily',
                'second_name' => 'Clark',
                'three_name' => 'Williams',
                'image_path' => 'images/chef3.jpg',
                'email' => 'chef3@example.com',
                'password' => '123',
                'birth_date' => '1990-03-03',
                'mobile_number' => '1122334455',
                'cv_path' => 'cvs/chef3.pdf',
                'location' => 'Homs',
                'state_id' => 3,
            ],
            [
                'user_name' => 'Bekdash',
                'first_name' => 'Michael',
                'second_name' => 'Brown',
                'three_name' => 'Davis',
                'image_path' => 'images/chef4.jpg',
                'email' => 'chef4@example.com',
                'password' => '123',
                'birth_date' => '1975-04-04',
                'mobile_number' => '5566778899',
                'cv_path' => 'cvs/chef4.pdf',
                'location' => 'Latakia',
                'state_id' => 4,
            ],
        ];

        DB::table('chefs')->insert($chefs);
    }
}
