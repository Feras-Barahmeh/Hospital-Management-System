<?php

namespace App\Repository;

use App\Helpers\Manipulate;
use App\Helpers\Session;
use App\Interfaces\Repository\IDepartments;
use App\Models\Department;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class DepartmentRepository implements IDepartments
{
    /**
     * Set a success message for a department and store it in the session.
     *
     * @param Department $department The department to which the message pertains.
     * @param string $nameMessage The key for the message text in the 'dashboard/departments' language file.
     * @param string $title The title for the success message (default: 'well_done').
     *
     * @return void
     */
    private function setMessageSuccess(Department $department, string $nameMessage, string $title='well_done'): void
    {
        Session::flashArray('success-popup', [
            'title' => trans('common.'.$title),
            'text' => Manipulate::format(__('dashboard/departments.'.$nameMessage), $department->name),
        ]);
    }
    /**
     * Set a success message for a department and store it in the session.
     *
     * @param Department|string $department The department to which the message pertains.
     * @param string $nameMessage The key for the message text in the 'dashboard/departments' language file.
     * @param string $title The title for the success message (default: 'well_done').
     *
     * @return void
     */
    private function setMessageFail(Department|string $department, string $nameMessage, string $title='oops'): void
    {
        Session::flashArray('fail-popup', [
            'title' => trans('common.'.$title),
            'text' => Manipulate::format(
                __('dashboard/departments.'.$nameMessage),
                    is_string($department) ? $department : $department->name
            ),
        ]);
    }


    public function all(): Collection
    {
        return Department::orderBy('id', 'desc')->get();
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:department_translations,name,' . $request->input('name'),
        ], [
            'name.exists' => Manipulate::format(
                __('dashboard/departments.exist'),
                $request->input('name')),
        ]);


        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $department = Department::create([
                'name' => $request->input('name'),
        ]);
        $this->setMessageSuccess($department, 'success_add');


       unset($department);
        return Redirect::route('admin.departments.index');
    }


    /**
     * @throws ValidationException
     */
    public function update(Request $request): RedirectResponse
    {


        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'id'    => 'unique:departments,id,' . $request->id,
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $department = Department::find($request->id);
        $department->update([
            'name' => $request->name,
        ]);
        $this->setMessageSuccess($department, 'success_update');

        unset($department);
        return Redirect::route('admin.departments.index');
    }


    public function destroy($id): RedirectResponse
    {
        $department = Department::find($id);

        if ($department) {
            $department?->delete();
            $this->setMessageSuccess($department, 'success_delete');

        } else {
            $this->setMessageFail($department, 'failed');
        }

        unset($department);
        return Redirect::route('admin.departments.index');

    }
}
