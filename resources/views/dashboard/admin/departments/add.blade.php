<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    {{ trans('dashboard/departments.add_department') }}
                </h1>
                <button type="button" class="btn-close border-0" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body w-100">
                <form class="form-horizontal w-100" action="{{ route('admin.departments.store') }}" method="POST"  autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ trans('dashboard/departments.name_department') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ trans('dashboard/departments.name') }}">
                    </div>

                    <div class="form-floating">
                        <label for="floatingTextarea">{{ __('dashboard/departments.description') }}</label>
                        <textarea class="form-control" name="description" placeholder="{{ __('dashboard/departments.leave_description') }}" id="floatingTextarea" rows="10"></textarea>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary pl-10 pr-10 pt-1 pb-1" data-bs-dismiss="modal">
                            {{ trans('common.close') }}
                        </button>
                        <button type="submit" class="btn btn-primary pl-10 pr-10 pt-1 pb-1">
                            {{ trans('common.add') }}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
