<?php

namespace App\Repository;

use App\Http\Controllers\TraitsController\InsurancesController;
use App\Interfaces\Repository\DatabaseInsurancesInterface;
use App\Models\Insurance;
use App\Rules\InsurancesCompleted;
use App\Traits\Messages;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class InsuranceRepository implements DatabaseInsurancesInterface
{

        use InsurancesController, Messages;

        /**
         * @inheritDoc
         */
        public function index(): View|\Illuminate\Foundation\Application|Factory|Application
        {
                return view('dashboard.admin.insurances.index', [
                        'insurances' => Insurance::all(),
                ]);
        }

        /**
         * @inheritDoc
         */
        public function create()
        {
                // TODO: Implement create() method.
        }

        /**
         * @inheritDoc
         * @throws ValidationException
         */
        public function store(Request $request): RedirectResponse
        {
                $this->pushToRule('company_name', new InsurancesCompleted);

                $validator = Validator::make($request->all(), $this->rules);
                if ($validator->fails()) throw new ValidationException($validator);

                $flag = Insurance::create($request->all());
                if ($flag) {
                        self::popupSuccess('insurances', 'success_add', request('company_name'));
                        return Redirect::route('admin.insurances.index');
                }

                self::popupFail('insurance', 'fail_add', request('company_name'));
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
        public function edit(string $id)
        {
                // TODO: Implement edit() method.
        }

        /**
         * @inheritDoc
         *
         * @throws ValidationException
         */
        public function update(Request $request, string $id): RedirectResponse
        {
                $this->pushRule('company_name', ['required', 'max:40', 'unique:insurance_translations,company_name,'.$id,  new InsurancesCompleted]);
                $this->pushToRule('company_code', $id);
                $validator = Validator::make($request->all(), $this->rules);
                if ($validator->fails()) throw new ValidationException($validator);

                $insurance = Insurance::find($id);
                $flag = $insurance->update($request->all());
                if ($flag) {
                        self::popupSuccess('insurances', 'success_update', request('company_name'));
                        return Redirect::route('admin.insurances.index');
                }

                self::popupFail('insurances', 'fail_update', request('company_name'));
                return Redirect::back();

        }

        /**
         * @inheritDoc
         */
        public function destroy(string $id): RedirectResponse
        {
                $insurance = Insurance::find($id);
                $name = $insurance->company_name ?? '';
                if ($insurance && $insurance->delete()) {

                        self::popupSuccess('insurances', 'success_delete', $name);
                        return Redirect::route('admin.insurances.index');
                }
                self::popupFail('insurances', 'failed', $insurance->company_name);
                return Redirect::back();

        }

        /**
         * @inheritDoc
         */
        public function toggleStatus(string $id): RedirectResponse
        {
                $insurance = Insurance::findOrFail($id);
                $insurance->update([
                    'status' => ! $insurance->status,
                ]);

                if ($insurance->save()) {
                        self::successNotification('insurances', 'success_toggle_status');
                        return Redirect::route('admin.insurances.index');
                }

                self::failNotification('insurances', 'fail_toggle_status');
                return Redirect::back();
        }
}
