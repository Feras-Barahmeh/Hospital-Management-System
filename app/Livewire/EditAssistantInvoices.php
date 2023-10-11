<?php

namespace App\Livewire;

use App\Helpers\Transactions;
use App\Http\Controllers\TraitsController\AssistantInvoicesController;
use App\Models\AssistantInvoicePaymentRecord;
use App\Models\AssistantInvoices;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class EditAssistantInvoices extends Component
{
        use AssistantInvoicesController;

        public AssistantInvoices $invoice;
        public float|int|string $recipient;
        public float|string $remainingAmount;

        public function mount(): void
        {
                $this->doctor = $this->invoice->doctor;
                $this->assistant = $this->invoice->assistant;
                $this->patient = $this->invoice->patient;
                $this->discountAmount = $this->invoice->discount_amount;
                $this->taxRate = $this->invoice->tax_rate;
                $this->taxAmount = $this->invoice->tax_amount;
                $this->totalWithTax = $this->invoice->total_with_tax;
                $this->paymentType = $this->invoice->payment_type;
                $this->assistantPrice = $this->assistant->price;
                $this->doctorDepartment = $this->doctor->department->name;
                $this->recipient = AssistantInvoicePaymentRecord::where('assistant_invoice_id', '=', $this->invoice->id)->sum('amount');
                $this->remainingAmount = (float)$this->invoice->price_assistant - (float)$this->recipient;
        }

        public function updateAssistantInvoice(): RedirectResponse|Redirector
        {
                $this->validate();
                $this->fillInvoice($this->invoice);

                if ($this->invoice->save()) {
                        Transactions::editCashReceipt($this->invoice, $this->downPayment);
                        self::showSuccessPopup('invoices', 'success_edit', ['name' => $this->invoice->id]);
                        return Redirect::route('admin.invoices-assistants.index');
                }
                self::showPopupFail('invoices', 'fail_edit', ['id' => $this->invoice->id]);
                return Redirect::back();
        }

        public function render(): View|\Illuminate\Foundation\Application|Factory|Application
        {
                return view('livewire.assistant-invoices.edit-assistant-invoices');
        }
}
