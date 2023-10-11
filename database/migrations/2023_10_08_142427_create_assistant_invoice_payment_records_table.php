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
                /**
                 * Payment Recording:
                 * This is a record of all payments made by patients, insurance companies, or any other sources.
                 * It should include details such as the date, payment method, amount, and reference number.
                 */
                Schema::create('assistant_invoice_payment_records', function (Blueprint $table) {
                        $table->id();
                        $table->dateTime('date');

                        $table->smallInteger('payment_type');

                        $table->foreignId('patient_id')
                                ->constrained('patients')
                                ->cascadeOnDelete();


                        $table->foreignId('assistant_invoice_id')
                                ->nullable()
                                ->constrained('assistant_invoices')
                                ->cascadeOnDelete();


                        $table->decimal('amount', 10);

                        $table->timestamps();
                });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
                Schema::dropIfExists('assistant_invoice_payment_records');
        }
};
