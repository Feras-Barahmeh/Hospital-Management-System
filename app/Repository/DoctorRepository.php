<?php

namespace App\Repository;

use App\Helpers\Enums\Disks;
use App\Helpers\Manipulate;
use App\Helpers\Session;
use App\Interfaces\Repository\IDoctors;
use App\Models\Department;
use App\Models\Doctor;
use App\Traits\Messages;
use App\Traits\Upload;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class DoctorRepository implements IDoctors
{
    use Upload, Messages;
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
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $doctors = Doctor::all();

        return view('dashboard.admin.doctors.index', [
            'doctors' => $doctors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $departments = Department::all();
        return view('dashboard.admin.doctors.add', [
            'departments' => $departments,
        ]);
    }
    /**
     * Fill an array with data from a request object.
     *
     * @param Request $request The request object containing the data.
     *
     * @return array An associative array with data from the request.
     */
    private function fillProperty($request): array
    {
        return [
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'status'        => $request->status,
            'department_id' => $request->department,
            'price'         => $request->price,
            'phone'         => $request->phone,
            'name'          => $request->name,
            'appointments'  => implode(',', $request->appointments),
        ];
    }
    /**
     * Store a newly created resource in storage.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $validate = Validator::make($request->all(), [
           'name'               => 'required|max:100|unique:doctor_translations,name,'.$request->input('name'),
           'password'           => 'required|min:5',
           'confirm-password'   => 'same:password',
            'email'             => 'required|email|unique:doctors',
            'price'             => 'required|numeric|gt:0',
            'phone'             => 'required|numeric',
            'status'            => 'required|boolean',
            'department'        => 'required|numeric',
            'appointments'      => 'required',
            'photo'             => 'required',
        ]);

        if ($validate->fails()) {
            throw new ValidationException($validate);
        }

        $doctor = Doctor::create($this->fillProperty($request));

        self::sort($request, 'photo', 'doctors', Disks::BUI->value, $doctor->id, Doctor::class);

        self::popupSuccess('doctors', 'success_add', $doctor->name);

        return Redirect::route('admin.doctors.create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    }
}
