<?php

namespace App\Repository;

use App\Helpers\Enums\BloodTypes;
use App\Helpers\Enums\Sex;
use App\Http\Controllers\TraitsController\Controller;
use App\Http\Controllers\TraitsController\PatientsController;
use App\Interfaces\Repository\DatabasePatientsInterface;
use App\Models\BloodType;
use App\Models\Patient;
use App\Traits\Messages;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;

class PatientRepository implements DatabasePatientsInterface
{
        use PatientsController, Controller, Messages;

        /**
         * @inheritDoc
         */
        public function index(): View|\Illuminate\Foundation\Application|Factory|Application
        {
                return view(self::VIEW_DIR . 'index', [
                        'patients' => Patient::all(),
                ]);
        }

        /**
         * @inheritDoc
         */
        public function create(): \Illuminate\Foundation\Application|Factory|View|Application
        {
                return view(self::VIEW_DIR . 'add', [
                        'bloodTypes' => BloodType::all(),
                ]);
        }

        /**
         * @inheritDoc
         */
        public function store(Request $request): RedirectResponse
        {
                $rules = $this->pushToRule($this->rules, 'sex', new Enum(Sex::class));
                $rules = $this->pushToRule($rules, 'blood_type', new Enum(BloodTypes::class));
                $validator = Validator::make($request->all(), $rules);

                if ($validator->passes()) {
                        $flag = Patient::create($request->all());
                        if ($flag) {
                                self::showSuccessPopup('patients', 'success_add', ['name' => request('name_patient')]);
                                return Redirect::route('admin.patients.index');
                        }

                }

                self::showPopupFail('patients', 'not_exist', ['name' => request('name_patient')]);
                return Redirect::back();
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
                return view(self::VIEW_DIR . 'edit', [
                        'bloodTypes' => BloodType::all(),
                        'patient' => Patient::findOrFail($id),
                ]);
        }

        /**
         * @inheritDoc
         */
        public function update(Request $request, string $id): RedirectResponse
        {
                $rules = $this->pushToRule($this->rules, 'sex', new Enum(Sex::class));
                $rules = $this->pushToRule($rules, 'blood_type', new Enum(BloodTypes::class));
                $rules = $this->pushToRule($rules, 'name_patient', "name_patient,$id");
                $rules = $this->pushToRule($rules, 'phone_number', "phone_number,$id");
                $rules = $this->pushToRule($rules, 'email', "email,$id");

                $validator = Validator::make($request->all(), $rules);

                if ($validator->passes()) {
                        $patient = Patient::findOrFail($id);
                        $flag = $patient->update($request->all());
                        if ($flag) {
                                self::showSuccessPopup('patients', 'success_edit', ['name' => $patient->name_patient]);
                                return Redirect::route('admin.patients.index');
                        }
                }

                self::showPopupFail('patients', 'not_exist', ['name' => request('name_patient')]);
                return Redirect::back();
        }

        /**
         * @inheritDoc
         */
        public function destroy(string $id): RedirectResponse
        {
                $patient = Patient::findOrFail($id);
                $name = $patient->name_patient ?? '';

                if ($patient && $patient->delete()) {
                        self::showSuccessPopup('patients', 'success_delete', ['name' => $name]);
                        return Redirect::route('admin.patients.index');
                }

                self::showPopupFail('patients', 'not_exist', ['name' => $name]);
                return Redirect::back();
        }
}
