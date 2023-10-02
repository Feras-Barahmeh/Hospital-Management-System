<?php

namespace App\Http\Controllers\TraitsController;


trait PatientsController
{
        protected const  VIEW_DIR = 'dashboard.admin.patients.';

        protected array $rules = [
                'name_patient' => 'required|string|max:150|unique:patient_translations',
                'email' => 'required|string|max:150|unique:patients',
                'phone_number' => 'required|string|max:10|unique:patients',
                'sex' => ['required', ],
                'blood_type' => ['required', ],
                'address' => 'required|string|max:150',
        ];
}
