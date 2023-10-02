<?php

namespace App\Http\Controllers\TraitsController;

trait AmbulanceController
{
        public array $rules = [
                'car_number'                    => 'required|max:11|alpha_num|unique:ambulances',
                'year_made'                     =>'required|numeric|min:1950|max:2030',
                'driver_license_number'         =>'required|string|max:9|unique:ambulances',
                'car_model'                             =>'required|string|max:15',
                'driver_name'                           =>'required|string|max:100',
                'property'                              =>'required|numeric|min:0|max:3',
                'is_available'                          =>'required',
                'driver_phone'                          =>'required|numeric',
                'note'                          =>'max:255',
        ];
}
