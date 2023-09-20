<?php

namespace App\Repository;

use App\Helpers\Manipulate;
use App\Helpers\Session;
use App\Interfaces\Repository\IDepartments;
use App\Models\Department;
use App\Traits\Messages;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class DepartmentRepository implements IDepartments
{
    use Messages;



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

        $department = Department::create($request->all());
        self::popupSuccess('departments', 'success_add', $department->name);


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
        $department->update($request->except(['id']));
        self::popupSuccess('departments', 'success_update', $department->name);

        unset($department);
        return Redirect::route('admin.departments.index');
    }


    public function destroy($id): RedirectResponse
    {
        $department = Department::find($id);

        if ($department) {
            $department?->delete();
            self::popupSuccess('departments', 'success_delete', $department->name);

        } else {
            self::popupFail('departments', 'failed');
        }

        unset($department);
        return Redirect::route('admin.departments.index');

    }
}
