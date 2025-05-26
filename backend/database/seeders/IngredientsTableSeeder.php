<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsTableSeeder extends Seeder
{
    public function run()
    {
       
        DB::table('ingredients')->delete();

        
        $ingredients = [
            'لحم بقر',
            'دجاج',
            'توابل شاورما',
            'ثوم',
            'لبن',
            'زيت',
            'خبز',
            'طماطم',
            'خيار',
            'بصل',
            'فجل',
            'بقدونس',
            'نعناع',
            'دبس رمان',
            'زيت زيتون',
            'حمص',
            'طحينة',
            'ليمون',
            'برغل',
            'عدس',
            'أرز',
            'توابل برياني',
            'زبادي',
            'لحم مفروم',
            'سمبوسة',
            'زربيان',
            'زبيب',
            'لوز',
            'طاجين',
            'بهارات طاجين',
            'كسكس',
            'دقيق',
            'عسل',
            'سمسم',
            'زبدة',
            'خضروات',
            'حليب مكثف',
            'توابل دال',
            'خميرة',
            'توابل كاري',
            'سمك طازج',
            'صلصة الصويا',
            'Wasabi',
            'عجينة ساموسا',
            'فاصوليا',
            'خبز بوريتو',
            'خبز إنشيلادا',
            'أفوكادو',
            'ليمون',
            'رقائق الذرة',
            'جبنة',
            'خبز برجر',
            'خس',
            'معكرونة',
            'سكر',
            'قرفة'
        ];

        foreach ($ingredients as $ingredient) {
            DB::table('ingredients')->insert([
                'ingredients' => $ingredient
            ]);
        }
    }
}
