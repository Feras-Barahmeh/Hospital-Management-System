<?php

use App\Helpers\Enums\Sex;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
                Schema::create('patients', function (Blueprint $table) {
                        $table->id();
                        $table->string('email')->unique();
                        $table->date('BOD');
                        $table->string('phone_number');
                        $table->enum('sex',  [Sex::Male->value, Sex::Female->value]);
                        $table->enum('blood_type', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']);


                        $table->timestamps();
                });
        }

        /**
         * Reverse the migration
         */
        public function down(): void
        {
                Schema::dropIfExists('patients');
        }
};
