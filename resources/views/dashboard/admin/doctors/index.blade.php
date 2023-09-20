@extends('dashboard.layouts.master')
@push('css')
    <!-- Internal Data table css -->
    <link href="{{ asset('dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{ asset('dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{ asset('dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{ asset('dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endpush

@section('page-header')
    {{-- breadcrumb --}}
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> {{ trans('dashboard/doctors.title') }}</h4>
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
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
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
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex gap-10">
                        {{-- start add doctor --}}
                        <a href="{{ route('admin.doctors.create') }}"
                           class="btn btn-outline-primary ">
                            {{ __('dashboard/doctors.add_doctor') }}
                        </a>
                        {{-- End add doctor --}}
                        {{-- delete selected btn --}}

                        <button type="button" class="btn btn-outline-danger" disabled id="BtnDeleteSelected"
                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Delete selected doctors
                        </button>
                        {{-- end delete selected btn --}}
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>

                                    <th class="text-center " check-all-th>
                                        <div class="form-check">
                                            <label for="select-slide-table">select</label>
                                        </div>
                                    </th>
                                    <th class="wd-15p border-bottom-0">{{ __('common.img') }}</th>
                                    <th class="wd-15p border-bottom-0"> {{ __('common.name') }}</th>
                                    <th class="wd-15p border-bottom-0"> {{ __('common.email') }}</th>
                                    <th class="wd-15p border-bottom-0"> {{ __('dashboard/doctors.phone') }}</th>
                                    <th class="wd-15p border-bottom-0"> {{ __('dashboard/doctors.price') }}</th>
                                    <th class="wd-15p border-bottom-0"> {{ __('dashboard/doctors.status') }}</th>
                                    <th class="wd-15p border-bottom-0"> {{ __('dashboard/doctors.department') }}</th>
                                    <th class="wd-20p border-bottom-0"> {{ __('common.join_at') }}</th>
                                    <th class="wd-20p border-bottom-0"> {{ __('common.operations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @each('dashboard.admin.doctors.doctors', $doctors, 'doctor')
                            </tbody>
                            @include('dashboard.admin.doctors.purge')
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

@endsection

@push('js')
    <!-- Internal Data tables -->
    <script src="{{ asset('dashboard/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    {{-- Internal  Datatable js --}}
    <script src="{{ asset('dashboard/js/table-data.js')}}"></script>

    {{-- doctors --}}
    <script src="{{ asset('dashboard/js/doctors/main.js')}}"></script>

@endpush


