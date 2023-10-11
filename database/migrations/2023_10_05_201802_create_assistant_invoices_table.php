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
                Schema::create('assistant_invoices', function (Blueprint $table) {
                        $table->id();

                        $table->dateTime('invoice_date');

                        $table->foreignId('patient_id')
                                ->constrained('patients')
                                ->cascadeOnDelete();

                        $table->foreignId('doctor_id')
                                ->constrained('doctors')
                                ->cascadeOnDelete();

                        $table->foreignId('assistant_id')
                                ->constrained('assistants')
                                ->cascadeOnDelete();

                        $table->foreignId('department_id')
                                ->constrained('departments')
                                ->cascadeOnDelete();

                        $table->foreignId('patient_account_id')
                                ->nullable()
                                ->constrained('patient_accounts')
                                ->cascadeOnDelete();

                        $table->decimal('price_assistant');
                        $table->decimal('discount_amount');
                        $table->string('tax_rate');
                        $table->string('tax_amount');
                        $table->decimal('total_with_tax');
                        $table->unsignedSmallInteger('payment_type');
                        $table->timestamps();
                });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
                Schema::dropIfExists('assistant_invoices');
        }
};
