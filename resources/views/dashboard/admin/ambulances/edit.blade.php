@php use App\Helpers\Enums\Properties; @endphp
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
                                        <h4 class="card-title mb-1">Add Ambulance</h4>
                                        <a href="{{ route('admin.ambulances.index') }}"
                                           class="btn btn-primary mt-3 mb-0 pl-lg-4 pr-lg-4 pt-1 pb-1 ">
                                                {{ __('common.back') }}
                                        </a>
                                </div>

                                <div class="card-body pt-0">
                                        <form action="{{ route('admin.ambulances.update', $ambulance->id) }}" method="post"
                                              autocomplete="off">
                                                {{ method_field('PATCH')  }}
                                                @csrf
                                                <div class="">
                                                        <div class="row">
                                                                <div class="form-group col-4">
                                                                        <label for="car_number">{{ __('dashboard/ambulances.car_number') }}</label>
                                                                        <input type="text" class="form-control"
                                                                               id="car_number" name="car_number"
                                                                               value="{{ $ambulance->car_number }}"
                                                                               placeholder="{{ __('dashboard/ambulances.car_number') }}">
                                                                </div>

                                                                <div class="form-group col-4">
                                                                        <label for="year_made">{{ __('dashboard/ambulances.year_made') }}</label>
                                                                        <input type="number" class="form-control"
                                                                               name="year_made" id="year_made"
                                                                               value="{{ $ambulance->year_made }}"
                                                                               placeholder="1950-2030">

                                                                </div>
                                                                <div class="form-group col-4">
                                                                        <label for="driver_license_number">{{ __('dashboard/ambulances.driver_license_number') }}</label>
                                                                        <input type="text" class="form-control"
                                                                               name="driver_license_number"
                                                                               id="driver_license_number"
                                                                               value="{{ $ambulance->driver_license_number }}"
                                                                               placeholder="{{ __('dashboard/ambulances.driver_license_number') }}">
                                                                </div>
                                                        </div>

                                                        <div class="row">
                                                                <div class="form-group col-3">
                                                                        <label for="car_model">{{ __('dashboard/ambulances.car_model') }}</label>
                                                                        <input type="text" class="form-control"
                                                                               name="car_model" id="car_model"
                                                                               value="{{old('car_model') ??  $ambulance->car_model  }}"
                                                                               placeholder="{{ __('dashboard/ambulances.car_model') }}">
                                                                </div>
                                                                <div class="form-group col-3">
                                                                        <label for="driver_name">{{ __('dashboard/ambulances.driver_name') }}</label>
                                                                        <input type="text" class="form-control"
                                                                               name="driver_name" id="driver_name"
                                                                               value="{{ $ambulance->driver_name }}"
                                                                               placeholder="{{ __('dashboard/ambulances.driver_name') }}">
                                                                </div>
                                                                <div class="form-group col-3">
                                                                        <label for="driver_phone">{{ __('dashboard/ambulances.driver_phone') }}</label>
                                                                        <input type="text" class="form-control"
                                                                               name="driver_phone" id="driver_phone"
                                                                               value="{{ $ambulance->driver_phone }}"
                                                                               placeholder="{{ __('dashboard/ambulances.driver_phone') }}">
                                                                </div>

                                                                <div class="form-group col-3">
                                                                        <label for="property">{{ __('dashboard/ambulances.property') }}</label>
                                                                        <select class="form-control select2-no-search"
                                                                                id="property" name="property">
                                                                                <option value="{{ Properties::Owned->value }}"
                                                                                         @selected(old('property') === Properties::Owned->value ||  $ambulance->property === Properties::Owned->value )>
                                                                                        {{ Properties::Owned->name }}
                                                                                </option>
                                                                                <option value="{{ Properties::Rented->value }}"
                                                                                        @selected(old('property') === Properties::Rented->value  ||  $ambulance->property === Properties::Rented->value   )>
                                                                                        {{ Properties::Rented->name }}
                                                                                </option>
                                                                        </select>
                                                                </div>
                                                        </div>

                                                        <div class="row">
                                                                <div class="col-12">
                                                                        <div class="form-floating">
                                                                                <label for="floatingTextarea"
                                                                                       class="modal-label">Note</label>
                                                                                <textarea class="form-control"
                                                                                          name="note"
                                                                                          placeholder="Leave note"
                                                                                          id="floatingTextarea"
                                                                                          rows="5">{{ $ambulance->note }}</textarea>
                                                                        </div>

                                                                </div>
                                                        </div>

                                                        <div class="checkbox">
                                                                <div class="custom-checkbox custom-control col-3">
                                                                        <input type="checkbox" data-checkboxes="mygroup"
                                                                               value="{{ old('is_available') ?? 1 || $ambulance->is_available == 1 }}"
                                                                               checked
                                                                               class="custom-control-input"
                                                                               name="is_available" id="checkbox-1">
                                                                        <label for="checkbox-1"
                                                                               class="custom-control-label mt-1">Valid
                                                                                ambulance</label>
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



