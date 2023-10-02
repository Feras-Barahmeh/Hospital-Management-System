@extends('dashboard.layouts.master')

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto text-dark"> {{ $department->name }}</h4>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content gap-10">
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-info btn-icon mr-2"><i class="mdi mdi-filter-variant"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-danger btn-icon mr-2"><i class="mdi mdi-star"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-warning  btn-icon mr-2"><i class="mdi mdi-refresh"></i></button>
            </div>
            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-primary">14 Aug 2019</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate"
                         data-x-placement="bottom-end">
                        <a class="dropdown-item" href="#">2015</a>
                        <a class="dropdown-item" href="#">2016</a>
                        <a class="dropdown-item" href="#">2017</a>
                        <a class="dropdown-item" href="#">2018</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <h6 class="sub-title text-dark">
                {!! Manipulate::format(__('dashboard/departments.doctors_in_department'), $department->name) !!}
            </h6>
        </div>
    </div>
    <div class="row">

        @foreach($department->doctors as $doctor)
            <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                <div class="card card-purple">
                    <div class="border-bottom p-3">
                        <h5 class="card-title mb-0 pb-0">{{ $doctor->name }}</h5>
                    </div>
                    <div class="card-body text-purple">
                        <div class="text-center">
                            {!! Blade::img( $doctor, 'doctor_default.jpg', class:'card-img') !!}
                        </div>

                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('admin.doctors.show', $doctor->id) }}" class="text-white">
                            {{ __('dashboard/departments.medical_history') }}
                        </a>
                        <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="badge badge-info p-1 ">
                            {{ __('common.edit_info') }}
                        </a>

                    </div>
                </div>
            </div>

        @endforeach


    </div>


    </div>
    </div>
@endsection
