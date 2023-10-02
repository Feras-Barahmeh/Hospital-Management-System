<?php

namespace Database\Seeders;

use App\Models\Assistant;
use App\Models\BloodType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Remove previous
            DB::table('blood_types')->delete();

            $days = [
                    'en' => [
                            ['type' => 'A+'],
                            ['type' => 'A-'],
                            ['type' => 'B+'],
                            ['type' => 'B-'],
                            ['type' => 'AB+'],
                            ['type' => 'AB-'],
                            ['type' => 'O+'],
                            ['type' => 'O-'],
                    ],

                    'ar' => [
                            ['type' => 'أ+'],
                            ['type' => 'أ-'],
                            ['type' => 'ب+'],
                            ['type' => 'ب-'],
                            ['type' => 'أب+'],
                            ['type' => 'أب-'],
                            ['type' => 'و+'],
                            ['type' => 'و-'],
                    ],
            ];

            $defaultLocale = App::getLocale();
            foreach ($days as $locale => $data) {
                    App::setLocale($locale);
                    foreach ($data as $day) {
                            BloodType::create($day);
                    }
            }
            App::setLocale("$defaultLocale");
    }
}
