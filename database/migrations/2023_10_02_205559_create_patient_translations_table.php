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
                Schema::create('patient_translations', function (Blueprint $table) {
                        $table->id();
                        $table->string('locale')->index();
                        $table->string('address');
                        $table->string('name_patient');
                        $table->unique(['patient_id', 'locale']);

                        $table->foreignId('patient_id')
                                ->references('id')
                                ->on('patients')
                                ->cascadeOnDelete();
                });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
                Schema::dropIfExists('patient_translations');
        }
};
