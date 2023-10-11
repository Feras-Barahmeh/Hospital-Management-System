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
                Schema::create('patient_accounts', function (Blueprint $table) {
                        $table->id();

                        $table->dateTime('date');

                        $table->foreignId('patient_id')
                                ->constrained('patients')
                                ->cascadeOnDelete();

                        $table->decimal('credit');

                        $table->decimal('debit');
                });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
                Schema::dropIfExists('credit_debits');
        }
};
