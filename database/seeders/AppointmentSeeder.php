<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Remove previous
        DB::table('appointments')->delete();

        $days = [
            'en' => [
                ['name'    => 'Sunday'],
                ['name'    => 'Monday'],
                ['name'   => 'Tuesday'],
                ['name'   => 'Wednesday'],
                ['name'   => 'Thursday'],
                ['name'    => 'Friday'],
                ['name'  => 'Saturday'],
            ],

            'ar' => [
                ['name'    => 'الأحد'],
                ['name'    => 'الاثنين'],
                ['name'   => 'الثلاثاء'],
                ['name' => 'الأربعاء'],
                ['name'  => 'الخميس'],
                ['name'    => 'الجمعة'],
                ['name'  => 'السبت'],
            ],
        ];

        $defaultLocale = App::getLocale();
        foreach ($days as $locale => $data) {
            App::setLocale($locale);
            foreach ($data as $day) {
                Appointment::create($day);
            }
        }
        App::setLocale("$defaultLocale");
    }
}
