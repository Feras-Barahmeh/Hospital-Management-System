@extends('dashboard.layouts.master')
@extends('dashboard.layouts.index-css')


@section('page-header')
    {{-- breadcrumb --}}
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> {{ trans('dashboard/assistants.title_head') }}</h4>
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
                        {{-- start add assistant --}}
                        <button type="button" class="btn btn-outline-primary pl-10 pr-10 pt-1 pb-1 "
                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <span>
                                {{ trans('dashboard/assistants.add_assistant') }}
                            </span>
                        </button>

                        @include('dashboard.admin.assistants.add')
                        {{-- End add assistant --}}
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0"> {{ __('common.name') }}</th>
                                    <th class="wd-15p border-bottom-0"> {{ __('dashboard/assistants.price_assistant') }}</th>
                                    <th class="wd-15p border-bottom-0"> {{ __('dashboard/assistants.note') }}</th>
                                    <th class="wd-15p border-bottom-0"> {{ __('dashboard/assistants.status') }}</th>
                                    <th class="wd-20p border-bottom-0"> {{ __('common.created_since') }}</th>
                                    <th class="wd-20p border-bottom-0"> {{ __('common.updated_since') }}</th>
                                    <th class="wd-20p border-bottom-0"> {{ __('common.operations') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @each('dashboard.admin.assistants.assistants', $assistants, 'assistant')
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



