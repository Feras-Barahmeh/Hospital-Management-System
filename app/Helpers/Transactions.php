<?php

namespace App\Helpers;

use App\Helpers\Enums\PaymentTypes;
use App\Models\AssistantInvoicePaymentRecord;
use App\Models\PatientAccount;
use Illuminate\Support\Carbon;

/**
 * Static class to do transaction for invoices
 */
class Transactions
{
        public static function recordCreditDebitFromInvoice($invoice, $downAmount = 0): PatientAccount
        {
                $fund = new PatientAccount();
                $fund->fill([
                        'date' => $invoice->invoice_date,
                        'patient_id' => $invoice->patient->id,
                        'credit' => (float)$invoice->total_with_tax - (float)$downAmount,
                        'debit' => $downAmount,
                ]);
                $fund->save();
                return $fund;
        }

        public static function recordPaymentFromInvoice(&$invoice, $downPayment): AssistantInvoicePaymentRecord
        {
                $paymentRecord = new AssistantInvoicePaymentRecord();

                $paymentRecord->fill([
                        'date' => $invoice->invoice_date,
                        'payment_type' => $invoice->payment_type,
                        'patient_id' => $invoice->patient_id,
                        'assistant_invoice_id' => $invoice->id,
                        'amount' => $downPayment,
                ]);
                $paymentRecord->save();
                return $paymentRecord;
        }

        /**
         * Process a cash receipt for an invoice.
         *
         * This method checks the payment type and down payment amount on the invoice
         * and records the payment accordingly. If the payment type is 'Later' or the
         * down payment amount is not equal to the total amount with tax, it records
         * a credit/debit transaction and associates it with the invoice. If the payment
         * type is 'Cash,' it records a payment directly.
         *
         * @param object $invoice The invoice for which the cash receipt is being processed.
         * @param float|string $downPayment The down payment amount (if any).
         *
         * @return void
         */
        public static function cashReceipt(object &$invoice, float|string $downPayment): void
        {
                $patientAccount = Transactions::recordCreditDebitFromInvoice($invoice, $downPayment);
                $invoice->fill(['patient_account_id' => $patientAccount->id]);

                if ((float)$downPayment > 0 && $invoice->payment_type != PaymentTypes::Later->value) {
                        Transactions::recordPaymentFromInvoice($invoice, $downPayment);
                }

        }

        public static function decrementCreditInvoice(&$invoice, $value): void
        {
                $invoice->patientAccount->credit -= $value;
        }

        public static function incrementDebitInvoice(&$invoice, $value): void
        {
                $invoice->patientAccount->debit += $value;
        }

        public static function editCashReceipt(object &$invoice, $downPayment): void
        {

                if ((float)$downPayment > 0) {
                        $record = new AssistantInvoicePaymentRecord();
                        $record->fill([
                                'payment_type' => $invoice->payment_type,
                                'patient_id' => $invoice->patient_id,
                                'assistant_invoice_id' => $invoice->id,
                                'amount' => $downPayment,
                                'date' => Carbon::now(),
                        ]);
                        $record->save();

                        self::decrementCreditInvoice($invoice, $downPayment);
                        self::incrementDebitInvoice($invoice, $downPayment);
                        $invoice->patientAccount->save();
                }

        }
}
