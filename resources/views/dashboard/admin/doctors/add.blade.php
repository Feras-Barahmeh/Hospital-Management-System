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
                <h4 class="content-title mb-0 my-auto"> {{ trans('dashboard/doctors.title') . ' | Create' }}</h4>

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
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-20">
                        Add Doctor
                    </div>
                </div>

                <form action="{{ route('admin.doctors.store') }}" method="post" class="row d-flex flex-wrap p-2" enctype="multipart/form-data"> {{--  autocomplete="off" --}}
                        @csrf
                        {{-- Change Image --}}
                        <div class="col-md-3 col-sm-6">
                            <div class="modal-content ">
                                <div class="modal-body" id="modal-body-form" style="text-align: center;">
                                    <input class="upload-input" name="photo" id="myPhotos" type="file" accept="image/*" />
                                    <div class="Sliders">
                                        <canvas id="selectedImage"></canvas>
                                        <button type="button" class="zoomBtnOut">-</button>
                                        <button type="button" class="fitBtn">Fit</button>
                                        <button type="button" class="zoomBtnIn">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9">
                            {{-- name --}}
                            <div class="row row-xs formgroup-wrapper mb-2">
                                <div class="col-md-12">
                                    <div class="main-form-group">
                                        <label class="form-label" for="name">Name</label>
                                        <input class="form-control" name="name" value="{{ old('name') }}" id="name" placeholder="Doctor name" type="text">
                                    </div>
                                </div>
                            </div>
                            {{-- first row --}}
                            <div class="row row-xs formgroup-wrapper">
                                <div class="col-md-6">
                                    <div class="main-form-group">
                                        <label class="form-label"  for="email">Email</label>
                                        <input class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Doctor email" type="email">
                                    </div>
                                </div>
                                <div class="col-md-6 mg-t-20 mg-md-t-0">
                                    <div class="main-form-group">
                                        <label class="form-label" for="password">Password</label>
                                        <input class="form-control" id="password" name="password" value="{{ old('password') }}" show-password="show" placeholder="Doctor password" type="password">
                                    </div>
                                </div>
                                <div class="col-md-6 mg-t-20 mg-md-t-0">
                                    <div class="main-form-group">
                                        <label class="form-label" for="confirm-password">Confirm Password</label>
                                        <input class="form-control" id="confirm-password" name="confirm-password" value="{{ old('confirm-password') }}" show-password="show" placeholder="Confirm password"
                                               type="password">
                                    </div>
                                </div>
                                <div class="col-md-6 mg-t-20 mg-md-t-0">
                                    <div class="main-form-group">
                                        <label class="form-label" for="appointments">Appointments</label>
                                        <select name="appointments[]" class="form-control select2" id="appointments">
                                            <option selected>Chose one</option>
                                            <option>Sunday</option>
                                            <option>Munday</option>
                                            <option>tuseday</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            {{-- sec row --}}
                            <div class="row row-xs formgroup-wrapper mt-4">
                                <div class="col-md-6">
                                    <div class="main-form-group">
                                        <label class="form-label" for="phone">Phone number</label>
                                        <input class="form-control" value="{{ old('phone') }}" name="phone" id="phone" placeholder="Phone number" type="text">
                                    </div>
                                </div>

                                <div class="col-md-6 mg-t-20 mg-md-t-0">
                                    <div class="main-form-group">
                                        <label class="form-label" for="price">Price</label>
                                        <input class="form-control" id="price" value="{{ old('price') }}" name="price" placeholder="Enter Price" type="number">
                                    </div>
                                </div>

                                <div class="col-md-6 mg-t-20 mg-md-t-0">
                                    <div class="main-form-group">
                                        <label class="form-label" for="department">Department</label>
                                        <select class="form-control select2" name="department" id="department">
                                            <option disabled selected>Chose one</option>

                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}" @selected(old('department') == $department->id)>
                                                    {{ $department->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mg-t-20 mg-md-t-0">
                                    <div class="main-form-group">
                                        <label class="form-label" for="status">status</label>
                                        <select class="form-control select2" name="status" id="status">
                                            <option value="1" selected @selected(old('status') == 1)>Enable</option>
                                            <option value="0" @selected(old('status') == 0)>Disable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- theard row --}}
                            <div class="row row-xs formgroup-wrapper mt-4">
                                <div class="col-12 m-auto mb-4">
                                    <button type="submit" class="btn btn-info pl-10 pr-10 pt-1 pb-1">
                                        {{ trans('common.add') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>

        </div>
    </div>


@endsection

@push('js')
    <script>
        const loadFile = function (event) {
            const output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
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

@endpush


