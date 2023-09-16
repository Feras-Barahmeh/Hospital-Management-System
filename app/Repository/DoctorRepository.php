<?php

namespace App\Repository;

use App\Helpers\Manipulate;
use App\Helpers\Session;
use App\Interfaces\Repository\IDoctors;
use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class DoctorRepository implements IDoctors
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
        return Doctor::orderBy('id', 'desc')->get();
    }

    /**
     */
    public function store(Request $request)
    {
    }


    /**
     */
    public function update(Request $request)
    {


    }


    public function destroy($id)
    {


    }
}
