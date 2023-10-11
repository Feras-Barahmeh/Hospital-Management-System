@extends('dashboard.layouts.master')
@extends('dashboard.layouts.index-css')


@section('page-header')
        {{-- breadcrumb --}}
        <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                        <div class="d-flex">
                                <h4 class="content-title mb-0 my-auto"> {{ __('dashboard/invoices.title_head_assistant_invoice') }}</h4>
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
                                                <a href="{{ route('admin.invoices-assistants.create') }}"
                                                   class="btn btn-primary mt-3 mb-0 pl-lg-4 pr-lg-4 pt-1 pb-1 ">
                                                        {{ __('dashboard/invoices.add_invoice') }}
                                                </a>

                                                {{-- End add package --}}
                                        </div>
                                </div>

                                <div class="card-body">
                                        <div class=""> {{-- table-responsive --}}
                                                <table id="example" class="table key-buttons text-md-nowrap" style="width: 100%;">
                                                        <thead>
                                                        <tr>
                                                                <th class="wd-15p border-bottom-0">#</th>
                                                                <th class="wd-15p border-bottom-0"> {{ __('dashboard/invoices.patient') }}</th>
                                                                <th class="wd-15p border-bottom-0"> {{ __('dashboard/invoices.doctor') }}</th>
                                                                <th class="wd-15p border-bottom-0"> {{ __('dashboard/invoices.assistant') }}</th>
                                                                <th class="wd-15p border-bottom-0"> {{ __('dashboard/invoices.department') }}</th>
                                                                <th class="wd-15p border-bottom-0"> {{ __('dashboard/invoices.total_with_out_discount') }}</th>
                                                                <th class="wd-15p border-bottom-0"> {{ __('dashboard/invoices.discount_amount') }}</th>
                                                                <th class="wd-15p border-bottom-0"> {{ __('dashboard/invoices.tax_rate') }}</th>
                                                                <th class="wd-15p border-bottom-0"> {{ __('dashboard/invoices.tax_amount') }}</th>
                                                                <th class="wd-15p border-bottom-0"> {{ __('dashboard/invoices.total_with_tax') }}</th>
                                                                <th class="wd-15p border-bottom-0"> {{ __('dashboard/invoices.payment_type') }}</th>
                                                                <th class="wd-15p border-bottom-0"> {{ __('dashboard/invoices.invoice_date') }}</th>
                                                                <th class="wd-20p border-bottom-0"> {{ __('common.created_since') }}</th>
                                                                <th class="wd-20p border-bottom-0"> {{ __('common.updated_since') }}</th>
                                                                <th class="wd-20p border-bottom-0"> {{ __('common.operations') }}</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @each('dashboard.admin.invoices.invoices', $invoices, 'invoice')
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





