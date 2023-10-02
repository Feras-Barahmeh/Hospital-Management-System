<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
                Schema::create('ambulances', function (Blueprint $table) {
                        $table->id();
                        $table->string('car_number');
                        $table->string('year_made');
                        $table->string('driver_license_number');
                        $table->string('driver_phone');
                        $table->boolean('is_available')->default(true);
                        $table->boolean('property')->default(\App\Helpers\Enums\Properties::Owned->value);
                        $table->timestamps();
                });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
                Schema::dropIfExists('ambulances');
        }
};
