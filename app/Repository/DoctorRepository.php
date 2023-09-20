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
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\ValidationException;


class DoctorRepository implements IDoctors
{
    use Upload, Messages;
    private string $director = 'dashboard.admin.doctors.';
    private array $rules = [
        'phone'             => 'required|numeric',
        'status'            => 'required|boolean:0,1',
        'department_id'     => 'required|numeric',
        'appointments'      => 'required',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $doctors = Doctor::orderBy('id', 'DESC')->get();


        return view($this->director . 'index', [
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

        $validate = Validator::make($request->all(), array_merge([
           'name'               => 'required|max:100|unique:doctor_translations,name,'.$request->input('name'),
           'password'           => 'required|min:5',
           'confirm-password'   => 'same:password',
           'photo'             => 'required',

        ], $this->rules));


        if ($validate->fails()) {
            throw new ValidationException($validate);
        }
        $inputs = $request->except('Confirm_Password');
        $inputs['appointments'] = implode(',', $inputs['appointments']);
        $inputs['password'] = Hash::make($inputs['password']);

        $doctor = Doctor::create($inputs);

        self::sort($request, 'photo', 'doctors', Disks::BUI->value, $doctor->id, Doctor::class);

        self::popupSuccess('doctors', 'success_add', $doctor->name);

        return Redirect::route('admin.doctors.create');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $departments = Department::all();
        $appointments = Appointment::all();
        $doctor = Doctor::find($id);
        $setAppointments = explode(',', $doctor->appointments);

        return view($this->director . 'edit', [
            'departments'       => $departments,
            'appointments'      => $appointments,
            'doctor'            => $doctor,
            'setAppointments'   => $setAppointments,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @throws ValidationException
     */
    public function update(Request $request, $id): RedirectResponse
    {

        $validate = Validator::make($request->all(), array_merge([
            'name'               => 'required|max:100|unique:doctor_translations,name,'.$id,
            'email'             => 'required|email|unique:doctors,email,'.$id,
        ], $this->rules));

        if ($validate->fails()) {
            throw new ValidationException($validate);
        }


        $doctor = Doctor::find($id);

        if ($request->has('photo')) {
            self::rubOut(Disks::BUI->value, $doctor->image);
            self::sort($request, 'photo', 'doctors', Disks::BUI->value, $doctor->id, Doctor::class);
        }

        $inputs = $request->all();
        $inputs['appointments'] = implode(',', $inputs['appointments']);
        $doctor->update($inputs);

        if ($doctor->save()) {
            self::popupSuccess('doctors', 'success_update',  $doctor->name);
        }
        return Redirect::route('admin.doctors.index');
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
