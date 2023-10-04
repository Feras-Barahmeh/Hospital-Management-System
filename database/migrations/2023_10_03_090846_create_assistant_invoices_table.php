<?php

use App\Helpers\Enums\PaymentTypes;
use Carbon\Carbon;
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
                                ->references('id')
                                ->on('patients')
                                ->cascadeOnDelete();

                        $table->foreignId('doctor_id')
                                ->references('id')
                                ->on('doctors')
                                ->cascadeOnDelete();

                        $table->foreignId('assistant_id')
                                ->references('id')
                                ->on('assistants')
                                ->cascadeOnDelete();

                        $table->foreignId('department_id')
                                ->references('id')
                                ->on('departments')
                                ->cascadeOnDelete();

                        $table->decimal('price_assistant');
                        $table->decimal('discount_amount');
                        $table->string('tax_rate');
                        $table->string('tax_amount');
                        $table->decimal('total_with_tax');
                        $table->smallInteger('payment_type')->default(PaymentTypes::Cash->value)->unsigned();
                        $table->timestamps();
                });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
                Schema::dropIfExists('invoices');
        }
};
