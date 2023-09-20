<?php

namespace App\Repository;

use App\Helpers\Enums\Disks;
use App\Helpers\Manipulate;
use App\Helpers\Session;
use App\Interfaces\Repository\IDoctors;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Traits\Messages;
use App\Traits\Upload;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class DoctorRepository implements IDoctors
{
    use Upload, Messages;


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
            'departments'   => $departments,
            'appointments'  => Appointment::all(),
        ]);
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
            'phone'             => 'required|numeric',
            'status'            => 'required|boolean',
            'department_id'     => 'required|numeric',
            'appointments'      => 'required',
            'photo'             => 'required',
        ]);

        if ($validate->fails()) {
            throw new ValidationException($validate);
        }
        $inputs = $request->except('Confirm_Password');
        $inputs['appointments'] = implode(',', $inputs['appointments']);
        $doctor = Doctor::create($inputs);

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
    public function destroy($id): RedirectResponse
    {
        $doctor = Doctor::rid($id);
        self::popupSuccess('doctors', 'success_delete');
        unset($doctor);
        return Redirect::route('admin.doctors.index');
    }

    /**
     * Purge (delete permanently) selected doctor records along with associated images.
     */
    public function purge(Request $request): RedirectResponse
    {
        $ids = explode(',', $request->input('selected-values'));

        foreach ($ids as $id) {
            Doctor::rid($id);
        }

        self::popupSuccess('doctors', 'purge', count($ids));
        return Redirect::route('admin.doctors.index');
    }
}
