@extends('dashboard.layouts.master')
@extends('dashboard.layouts.index-css')


@section('page-header')
        {{-- breadcrumb --}}
        <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                        <div class="d-flex">
                                <h4 class="content-title mb-0 my-auto"> {{ __('dashboard/invoices.title_create_assistant_invoice') }}</h4>
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
        @include('dashboard.alerts.popup')
        @include('dashboard.alerts.errors')
        @include('dashboard.alerts.notification')
        <!-- row opened -->
                <livewire:create-assistant-invoices :assistants="$assistants" :patients="$patients" :doctors="$doctors"/>
        <!-- /row -->
        </div>
        <!-- Container closed -->
        </div>
        <!-- main-content closed -->

@endsection


@extends('dashboard.layouts.index-js')





