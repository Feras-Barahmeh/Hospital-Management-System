<?php

namespace Database\Seeders;

use App\Models\Assistant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class AssistantSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Remove previous
            DB::table('assistants')->delete();

            $days = [
                    'en' => [
                            ['name'      => 'Medical Examinations',  'price' => rand(10, 50)],
                            ['name' => 'Diagnosis and Treatment',  'price' => rand(10, 50)],
                            ['name' => 'Preventive Care',  'price' => rand(10, 50)],
                            ['name' => 'Laboratory Services',  'price' => rand(10, 50)],
                            ['name' => 'Radiology and Imaging',  'price' => rand(10, 50)],
                            ['name' => 'Emergency Care',  'price' => rand(10, 50)],
                            ['name' => 'Chronic Disease Management',  'price' => rand(10, 50)],
                            ['name' => 'Women\'s Health Services',  'price' => rand(10, 50)],
                            ['name' => 'Pediatric Care',  'price' => rand(10, 50)],
                            ['name' => 'Mental Health Services',  'price' => rand(10, 50)],
                            ['name' => 'Pharmacy Services',  'price' => rand(10, 50)],
                            ['name' => 'Rehabilitation Services',  'price' => rand(10, 50)],
                            ['name' => 'Dental and Oral Health Services',  'price' => rand(10, 50)],
                            ['name' => 'Nutrition and Diet Counseling',  'price' => rand(10, 50)],
                            ['name' => 'Health Education',  'price' => rand(10, 50)]
                    ],

                    'ar' => [
                            ['name'      => 'الفحوصات الطبية',  'price' => rand(10, 50)],
                            ['name' => 'تشخيص وعلاج',  'price' => rand(10, 50)],
                            ['name' => 'الرعاية الوقائية',  'price' => rand(10, 50)],
                            ['name' => 'خدمات المختبرات',  'price' => rand(10, 50)],
                            ['name' =>  'الأشعة والتصوير الطبي',  'price' => rand(10, 50)],
                            ['name' => 'الرعاية الطارئة',  'price' => rand(10, 50)],
                            ['name' => 'إدارة الأمراض المزمنة',  'price' => rand(10, 50)],
                            ['name' => 'خدمات صحة المرأة',  'price' => rand(10, 50)],
                            ['name' => 'رعاية الأطفال',  'price' => rand(10, 50)],
                            ['name' => 'خدمات الصحة النفسية',  'price' => rand(10, 50)],
                            ['name' => 'خدمات الصيدلة',  'price' => rand(10, 50)],
                            ['name' => 'خدمات التأهيل',  'price' => rand(10, 50)],
                            ['name' => 'خدمات صحة الفم والأسنان',  'price' => rand(10, 50)],
                            ['name' => 'خدمات التغذية والتنظيم الغذائي',  'price' => rand(10, 50)],
                            ['name' => 'التثقيف الصحي',  'price' => rand(10, 50)],
                    ],
            ];

            $defaultLocale = App::getLocale();
            foreach ($days as $locale => $data) {
                    App::setLocale($locale);
                    foreach ($data as $day) {
                            Assistant::create($day);
                    }
            }
            App::setLocale("$defaultLocale");
    }
}
