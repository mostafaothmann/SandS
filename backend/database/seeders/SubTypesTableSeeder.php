<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubTypesTableSeeder extends Seeder
{
    public function run()
    {
      
        $subTypes = [
      
            [
                'type_id' => 13, 
                'sub_types' => [
                    'شاورما',
                    'فتوش',
                    'حمص',
                    'تبولة',
                    'كبة',
                    'متبل',
                    'محشي',
                    'مشاوي',
                    'مجدرة',
                    'كنافة'
                ]
            ],
          
            [
                'type_id' => 14, 
                'sub_types' => [
                    'برياني',
                    'كبسة',
                    'مجبوس',
                    'شوربة لحم',
                    'شاورما خليجي',
                    'قوزي',
                    'جريش',
                    'سمبوسة',
                    'حنيذ',
                    'زربيان'
                ]
            ],
            [
                'type_id' => 15, 
                'sub_types' => [
                    'طاجين الدجاج',
                    'طاجين لحم',
                    'كسكس',
                    'حلوى الشباكية',
                    'بريك',
                    'حليب مكثف',
                    'سلطة الطماطم',
                    'شوربة العدس',
                    'حريرة',
                    'برياني'
                ]
            ],
            [
                'type_id' => 16, 
                'sub_types' => [
                    'برياني دجاج',
                    'دال',
                    'نان',
                    'كاري لحم',
                    'ساشيمي',
                    'ساموسا',
                    'تشاباتي',
                    'رايتا',
                    'باني بوري',
                    'روجين جوش'
                ]
            ],
            [
                'type_id' => 17,
                'sub_types' => [
                    'تاكو',
                    'بوريتو',
                    'إنشيلادا',
                    'غوادامولي',
                    'كيساديلا',
                    'تشيبس وسالسا',
                    'فاهيتا',
                    'تشوريسو',
                    'بولا',
                    'سيفيتشي'
                ]
            ],
            [
                'type_id' => 18, 
                'sub_types' => [
                    'برجر',
                    'بيتزا',
                    'ستيكي',
                    'سباغيتي',
                    'لازانيا',
                    'دجاج مقلي',
                    'سندويتش',
                    'كريب',
                    'كعكة الجبن',
                    'فطائر التفاح'
                ]
            ]
        ];

        foreach ($subTypes as $item) {
            foreach ($item['sub_types'] as $subType) {
                DB::table('sub_types')->insert([
                    'sub_type' => $subType,
                    'type_id' => $item['type_id']
                ]);
            }
        }
    }
}
