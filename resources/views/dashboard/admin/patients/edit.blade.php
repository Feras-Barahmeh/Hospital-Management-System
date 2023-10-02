@php use App\Helpers\Enums\Properties;use App\Helpers\Enums\Sex; @endphp
@extends('dashboard.layouts.master')
@extends('dashboard.layouts.index-css')


@section('page-header')
        {{-- breadcrumb --}}
        <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                        <div class="d-flex">
                                <h4 class="content-title mb-0 my-auto"> {{ __('dashboard/packages.title_head_create') }}</h4>
                        </div>
                </div>
                <div class="d-flex my-xl-auto right-content gap-10">
                        <div class="pr-1 mb-3 mb-xl-0">
                                <button type="button" class="btn btn-info btn-icon mr-2"><i
                                                class="mdi mdi-filter-variant"></i></button>
                        </div>
                        <div class="pr-1 mb-3 mb-xl-0">
                                <button type="button" class="btn btn-danger btn-icon mr-2"><i class="mdi mdi-star"></i>
                                </button>
                        </div>
                        <div class="pr-1 mb-3 mb-xl-0">
                                <button type="button" class="btn btn-warning  btn-icon mr-2"><i
                                                class="mdi mdi-refresh"></i></button>
                        </div>

                        <div class="mb-3 mb-xl-0">
                                <div class="btn-group dropdown">
                                        <button type="button" class="btn btn-primary">14 Aug 2019</button>
                                        <button type="button"
                                                class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right"
                                             aria-labelledby="dropdownMenuDate"
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
        @include('dashboard.alerts.popup')
        @include('dashboard.alerts.errors')
        @include('dashboard.alerts.notification')

        <div class="row row-sm">

                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                        <div class="card  box-shadow-0 ">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                        <h4 class="card-title mb-1">{{ __('dashboard/patients.add_patient') }}</h4>
                                        <a href="{{ route('admin.patients.index') }}"
                                           class="btn btn-primary mt-3 mb-0 pl-lg-4 pr-lg-4 pt-1 pb-1 ">
                                                {{ __('common.back') }}
                                        </a>
                                </div>

                                <div class="card-body pt-0">
                                        <form action="{{ route('admin.patients.update', $patient->id) }}" method="post"
                                              autocomplete="off">
                                                 {{ method_field('PATCH') }}
                                                @csrf
                                                <div class="">
                                                        <div class="row">
                                                                <div class="form-group col-3">
                                                                        <label for="name_patient">{{ __('dashboard/patients.name_patient') }}</label>
                                                                        <input type="text" class="form-control"
                                                                               id="name_patient" name="name_patient"
                                                                               value="{{ old('name_patient') ?? $patient->name_patient }}"
                                                                               placeholder="{{ __('dashboard/patients.name_patient') }}">
                                                                </div>

                                                                <div class="form-group col-3">
                                                                        <label for="email">{{ __('dashboard/patients.email') }}</label>
                                                                        <input type="email" class="form-control"
                                                                               name="email" id="email"
                                                                               value="{{ old('email') ?? $patient->email}}"
                                                                               placeholder="{{ __('dashboard/patients.email') }}">

                                                                </div>
                                                                <div class="form-group col-3">
                                                                        <label for="phone_number">{{ __('dashboard/patients.phone_number') }}</label>
                                                                        <input type="text" class="form-control"
                                                                               name="phone_number"
                                                                               id="phone_number"
                                                                               value="{{ old('phone_number') ?? $patient->phone_number }}"
                                                                               placeholder="{{ __('dashboard/patients.phone_number') }}">
                                                                </div>

                                                                <div class="form-group col-3">
                                                                        <label for="sex">{{ __('dashboard/patients.sex') }}</label>
                                                                        <select class="form-control select2-no-search"
                                                                                id="sex" name="sex">
                                                                                <option value="{{ Sex::Male->value }}" selected
                                                                                        @selected(old('sex') === Sex::Male->value || $patient->sex === Sex::Male->value )>
                                                                                        {{ Sex::Male->name }}
                                                                                </option>

                                                                                <option value="{{ Sex::Female->value }}"
                                                                                         @selected(old('sex') === Sex::Female->value  || $patient->sex === Sex::Female->value)>
                                                                                        {{ Sex::Female->name  }}
                                                                                </option>
                                                                        </select>
                                                                </div>
                                                        </div>

                                                        <div class="row">
                                                                <div class="form-group col-3">
                                                                        <label for="blood_type">{{ __('dashboard/patients.blood_type') }}</label>
                                                                        <select class="form-control select2-no-search"
                                                                                id="blood_type" name="blood_type">
                                                                                <option value="{{ $patient->blood_type }}">{{ $patient->blood_type }}</option>
                                                                                @foreach($bloodTypes as $bloodType)
                                                                                        @if($bloodType->type)
                                                                                                <option value="{{ $bloodType->type }}"
                                                                                                        @selected(old('blood_type') === $bloodType->type || $patient->blood_type === $bloodType->type   )>
                                                                                                        {{ $bloodType->type   }}
                                                                                                </option>
                                                                                        @endif
                                                                                @endforeach

                                                                        </select>
                                                                </div>

                                                                <div class="form-group col-3">
                                                                        <label for="BOD">{{ __('dashboard/patients.BOD') }}</label>
                                                                        <input type="date" class="form-control"
                                                                               name="BOD"
                                                                               id="BOD"
                                                                               value="{{ old('BOD') ?? $patient->BOD}}"
                                                                               placeholder="{{ __('dashboard/patients.BOD') }}">
                                                                </div>
                                                        </div>

                                                        <div class="row">
                                                                <div class="col-12">
                                                                        <div class="form-floating">
                                                                                <label for="floatingTextarea"
                                                                                       class="modal-label">{{ __('dashboard/patients.address') }}</label>
                                                                                <textarea class="form-control"
                                                                                          name="address"
                                                                                          placeholder="Leave address"
                                                                                          id="floatingTextarea"
                                                                                          rows="5">{{ old('address')?? $patient->address }}</textarea>
                                                                        </div>

                                                                </div>
                                                        </div>

                                                </div>

                                                <div class="row">
                                                        <button type="submit"
                                                                class="btn btn-primary mt-3 mb-0 pl-lg-4 pr-lg-4 pt-1 pb-1 ">
                                                                {{ __('common.add') }}
                                                        </button>
                                                </div>
                                        </form>
                                </div>
                        </div>
                </div>

        </div>
        </div>
        <!-- Container closed -->
        </div>
        <!-- main-content closed -->

@endsection


@extends('dashboard.layouts.index-js')



