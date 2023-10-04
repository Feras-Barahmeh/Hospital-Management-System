<?php

namespace App\Http\Controllers\TraitsController;

use App\Helpers\Enums\PaymentTypes;
use App\Models\Assistant;
use App\Models\AssistantInvoices;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use App\Traits\Messages;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

trait AssistantInvoicesController
{
        use Messages;

        public mixed $assistants;
        public mixed $patients;
        public Patient $patient;
        public mixed $doctors;
        public Doctor $doctor;
        public Assistant $assistant;
        public mixed $doctorDepartment;
        public mixed $assistantPrice = 0;

        public mixed $discountAmount = 0;
        public mixed $taxRate = 0;
        public mixed $taxAmount = 0;
        public mixed $totalWithTax = 0;
        public mixed $paymentType = PaymentTypes::Cash->value;


        /**
         * set doctor department
         *
         * @param string $id identify doctor
         * @return void
         */
        public function setDoctor(string $id): void
        {
                if (!$id) {
                        $this->doctorDepartment = '';
                        return;
                }
                $doctor = Doctor::findOrFail($id);
                $this->doctor = $doctor;
                $this->doctorDepartment = $doctor->department->name;
        }

        public function setPatient(string $id): void
        {
                if (!$id) return;
                $this->patient = Patient::findOrFail($id);
        }

        public function setTaxAmount(): void
        {
                $taxAmount = (float)$this->taxRate / 100 * (float)$this->totalWithTax;
                $this->taxAmount = number_format($taxAmount, 2);
                $this->totalWithTax = max(((float)$this->assistantPrice - (float)$this->discountAmount), 0);
        }

        /**
         * set assistant price
         *
         * @param string $id identify assistant
         * @return void
         */
        public function setAssistant(string $id): void
        {
                if (!$id) return;
                $assistant = Assistant::findOrFail($id);
                $this->assistant = $assistant;
                $this->assistantPrice = $assistant->price;
                $this->setTotalWithTax();
        }

        public function setPaymentType($type): void
        {
                $this->paymentType = $type;
        }

        public function setTotalWithTax(): void
        {
                $this->totalWithTax = max(((float)$this->assistantPrice - (float)$this->discountAmount), 0);
                $this->setTaxAmount();
                $this->totalWithTax += $this->taxAmount;
        }


        public function setDiscountAmount($value): void
        {
                $this->discountAmount = $value;
                $this->totalWithTax = max(((float)$this->assistantPrice - (float)$this->discountAmount), 0);
        }

        public function setTaxRate($value): void
        {
                $this->taxRate = $value;
                $this->setTaxAmount();
                $this->totalWithTax = max(((float)$this->assistantPrice - (float)$this->discountAmount), 0);
        }

        public function fillInvoice(&$invoice): void
        {
                $invoice->invoice_date = Carbon::now();
                $invoice->patient_id = $this->patient->id;
                $invoice->doctor_id = $this->doctor->id;
                $invoice->assistant_id = $this->assistant->id;
                $invoice->department_id = $this->doctor->department_id;
                $invoice->price_assistant = $this->assistant->price;
                $invoice->discount_amount = $this->discountAmount;
                $invoice->tax_rate = $this->taxRate;
                $invoice->tax_amount = $this->taxAmount;
                $invoice->total_with_tax = $this->totalWithTax;
                $invoice->payment_type = $this->paymentType;
        }

}
