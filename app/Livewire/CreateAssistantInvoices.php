<?php

namespace App\Livewire;

use App\Http\Controllers\TraitsController\AssistantInvoicesController;
use App\Models\AssistantInvoices;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class CreateAssistantInvoices extends Component
{
        use AssistantInvoicesController;

        public function saveAssistantInvoice(): \Illuminate\Http\RedirectResponse
        {
                $invoice = new AssistantInvoices();
                $this->fillInvoice($invoice);

                if ($invoice->save()) {
                        self::showSuccessPopup('invoices', 'success_add', ['name' => $invoice->id]);
                        return Redirect::route('admin.invoices-assistants.index');
                }
                self::showPopupFail('invoices', 'fail_add', ['id' => $invoice->id]);
                return Redirect::back();
        }

        public function render(): View|\Illuminate\Foundation\Application|Factory|Application
        {
                return view('livewire.assistant-invoices.create-assistant-invoices');
        }
}
