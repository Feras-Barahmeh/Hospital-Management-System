<?php

namespace App\Repository;

use App\Http\Controllers\TraitsController\AmbulanceController;
use App\Http\Controllers\TraitsController\Controller;
use App\Interfaces\Repository\DatabaseAmbulancesInterface;
use App\Models\Ambulance;
use App\Traits\Messages;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AmbulanceRepository implements DatabaseAmbulancesInterface
{

        use AmbulanceController, Messages, Controller;

        /**
         * @inheritDoc
         */
        public function index(): View|\Illuminate\Foundation\Application|Factory|Application
        {
                return view('dashboard.admin.ambulances.index', [
                        'ambulances' => Ambulance::all(),
                ]);
        }

        /**
         * @inheritDoc
         */
        public function create(): View|\Illuminate\Foundation\Application|Factory|Application
        {
                return view('dashboard.admin.ambulances.add');
        }

        /**
         * @inheritDoc
         *
         * @throws ValidationException
         */
        public function store(Request $request): RedirectResponse
        {
                $validator = Validator::make($request->all(), $this->rules);

                if ($validator->fails()) {
                        throw new ValidationException($validator);
                }

                $flag = Ambulance::create($request->all());

                if ($flag) {
                        self::popupSuccess('ambulances', 'success_add', request('car_number'));
                        return Redirect::route('admin.ambulances.index');
                }

                self::popupFail('ambulances', 'fail_add', request('car_number'));
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
                return view('dashboard.admin.ambulances.edit', [
                        'ambulance' => Ambulance::findOrFail($id),
                ]);
        }

        /**
         * @inheritDoc
         * @throws ValidationException
         */
        public function update(Request $request, string $id): RedirectResponse
        {
                $rules = $this->pushToRule($this->rules, 'car_number', "car_number,$id");
                $rules = $this->pushToRule($rules, 'driver_license_number', "driver_license_number,$id");

                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                        throw new ValidationException($validator);
                }

                $ambulance = Ambulance::findOrFail($id);
                $flag = $ambulance->update($request->all());

                if ($flag) {
                        self::popupSuccess('ambulances', 'success_edit', request('car_number'));
                        return Redirect::route('admin.ambulances.index');
                }

                self::popupFail('ambulances', 'fail_edit', request('car_number'));
                return Redirect::back();
        }

        /**
         * @inheritDoc
         */
        public function destroy(string $id): RedirectResponse
        {
                $ambulance = Ambulance::findOrFail($id);
                $name = $ambulance->car_number ?? '';

                if ($ambulance && $ambulance->delete()) {
                        self::popupSuccess('ambulances', 'success_delete', $name);
                        return Redirect::route('admin.ambulances.index');
                }

                self::popupFail('ambulances', 'failed', $name);
                return Redirect::back();
        }

        /**
         * @inheritDoc
         */
        public function toggleAvailable(string $id): RedirectResponse
        {
                $ambulance = Ambulance::findOrFail($id);
                $ambulance->update([
                        'is_available' => ! $ambulance->is_available,
                ]);

                if ($ambulance->save()) {
                        self::successNotification('ambulances', 'success_toggle_available');
                        return Redirect::route('admin.ambulances.index');
                }

                self::failNotification('ambulances', 'fail_toggle_available');
                return Redirect::back();
        }
}
