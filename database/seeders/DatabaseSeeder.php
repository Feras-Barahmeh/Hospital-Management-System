<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            /**
             * Static
             */
            UserSeeder::class,
            AdminSeeder::class,
            AppointmentSeeder::class,

            /**
             * Has Factory
             */
            DepartmentSeeder::class,
            DoctorSeeder::class,
            ImageSeeder::class,
        ]);
    }
}
