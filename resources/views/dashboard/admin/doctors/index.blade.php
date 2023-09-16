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
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> {{ trans('dashboard/departments.title') }}</h4>
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
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        {{-- start add department --}}
                        <button type="button" class="btn btn-primary-gradient pl-10 pr-10 pt-1 pb-1 "
                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <span>
                                {{ trans('dashboard/departments.add_department') }}
                            </span>
                        </button>

                        @include('dashboard.admin.departments.add')
                        {{-- End add department --}}
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0"> {{ trans('dashboard/departments.name') }}</th>
                                    <th class="wd-20p border-bottom-0"> {{ trans('dashboard/departments.created_at') }}</th>
                                    <th class="wd-20p border-bottom-0"> {{ trans('common.operations') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @each('dashboard.admin.departments.departments', $doctors, 'department')
                            </tbody>


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
    <!--Internal  Datatable js -->
    <script src="{{ asset('dashboard/js/table-data.js')}}"></script>

@endpush


