<?php

namespace App\Livewire;

use App\Http\Controllers\TraitsController\AssistantInvoicesController;
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

        public function mount(): void
        {
                $this->doctor = $this->invoice->doctors;
                $this->assistant = $this->invoice->assistants;
                $this->patient = $this->invoice->patients;
                $this->discountAmount = $this->invoice->discount_amount;
                $this->taxRate = $this->invoice->tax_rate;
                $this->taxAmount = $this->invoice->tax_amount;
                $this->totalWithTax = $this->invoice->total_with_tax;
                $this->paymentType = $this->invoice->payment_type;
                $this->assistantPrice = $this->assistant->price;
                $this->doctorDepartment = $this->doctor->department->name;
        }

        public function updateAssistantInvoice(): RedirectResponse|Redirector
        {
                $this->validate();
                $this->fillInvoice($this->invoice);

                if ($this->invoice->save()) {
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
