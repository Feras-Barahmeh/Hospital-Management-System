<?php

namespace App\Repository;

use App\Http\Controllers\TraitsController\AssistantInvoicesController;
use App\Interfaces\Repository\DatabaseInvoicesInterface;
use App\Models\Assistant;
use App\Models\AssistantInvoices;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AssistantInvoicesRepository implements DatabaseInvoicesInterface
{
        use AssistantInvoicesController;

        /**
         * @inheritDoc
         */
        public function index(): View|\Illuminate\Foundation\Application|Factory|Application
        {
                return view('dashboard.admin.invoices.index', [
                        'invoices' => AssistantInvoices::all(),
                ]);
        }

        /**
         * @inheritDoc
         */
        public function create(): View|\Illuminate\Foundation\Application|Factory|Application
        {
                return view('dashboard.admin.invoices.add', [
                        'patients' => Patient::all(),
                        'doctors' => Doctor::all(),
                        'assistants' => Assistant::all(),
                ]);
        }

        /**
         * @inheritDoc
         */
        public function store(Request $request)
        {
                // TODO: Implement store() method.
        }

        /**
         * @inheritDoc
         */
        public function show(string $id)
        {
                // TODO: Implement show() method.
        }

        /**
         * @inheritDoc
         */
        public function edit(string $id): View|\Illuminate\Foundation\Application|Factory|Application
        {
                return view('dashboard.admin.invoices.edit', [
                        'invoice' => AssistantInvoices::findOrFail($id),
                        'patients' => Patient::all(),
                        'doctors' => Doctor::all(),
                        'assistants' => Assistant::all(),
                ]);
        }

        /**
         * @inheritDoc
         */
        public function update(Request $request, string $id)
        {
                // TODO: Implement update() method.
        }

        /**
         * @inheritDoc
         */
        public function destroy(string $id): RedirectResponse
        {
                $invoice = AssistantInvoices::findOrFail($id);
                $id = $invoice->id ?? '';

                if ($invoice) {
                        $invoice->patientAccount->delete();
                        $invoice->delete();
                        self::showSuccessPopup('invoices', 'success_delete', ['id' => $id]);
                        return Redirect::route('admin.invoices-assistants.index');
                }

                self::showPopupFail('invoices', 'failed', ['id' => $id]);
                return Redirect::back();
        }
}
