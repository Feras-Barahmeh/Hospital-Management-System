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
        <div class="row row-sm">
                <!--div-->
                <div class="col-xl-12">
                        <div class="card mg-b-20">
                                <div class="card-header pb-0">
                                        <div class="d-flex gap-10">
                                                {{-- start add package --}}
                                                <a href="{{ route('admin.packages.create') }}"
                                                        class="btn btn-outline-info">
                                                        {{ __('dashboard/packages.add_package') }}
                                                </a>

                                                {{-- End add package --}}
                                        </div>
                                </div>

                                <div class="card-body">
                                        <div class="table-responsive">
                                                <table id="example" class="table key-buttons text-md-nowrap" style="width: 100%;">
                                                        <thead>
                                                        <tr>
                                                                <th class="wd-15p border-bottom-0">#</th>
                                                                <th class="wd-15p border-bottom-0"> {{ __('common.name') }}</th>
                                                                <th class="wd-15p border-bottom-0"> {{ __('dashboard/packages.note') }}</th>
                                                                <th class="wd-15p border-bottom-0"> {{ __('dashboard/packages.total_with_out_discount') }}</th>
                                                                <th class="wd-15p border-bottom-0"> {{ __('dashboard/packages.total_with_discount') }}</th>
                                                                <th class="wd-15p border-bottom-0"> {{ __('dashboard/packages.discount_amount') }}</th>
                                                                <th class="wd-15p border-bottom-0"> {{ __('dashboard/packages.tax') }}</th>
                                                                <th class="wd-15p border-bottom-0"> {{ __('dashboard/packages.out_of_the_door') }}</th>
                                                                <th class="wd-15p border-bottom-0"> {{ __('dashboard/packages.status') }}</th>
                                                                <th class="wd-20p border-bottom-0"> {{ __('common.created_at') }}</th>
                                                                <th class="wd-20p border-bottom-0"> {{ __('common.operations') }}</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                                @each('dashboard.admin.packages.packages', $packages, 'package')
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


@extends('dashboard.layouts.index-js')




