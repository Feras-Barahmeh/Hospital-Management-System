<div class="modal fade" id="exampleModal" modal-delete-selected tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard/doctors.delete_doctor') }}</h5>
                <button type="button" class="btn-close bg-transparent " data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <form action="{{ route('admin.purge') }}" method="post">
                {{ method_field('delete') }}
                @csrf
                <div class="modal-body mt-0">
                    <h5>{{ __('common.are_you_sure') }}</h5>
                    <input type="hidden" name="selected-values" id="SelectedValues">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pl-10 pr-10 pt-1 pb-1" data-bs-dismiss="modal" aria-label="Close">
                        {{trans('common.close')}}
                    </button>
                    <button type="submit" class="btn btn-outline-danger pl-10 pr-10 pt-1 pb-1">{{trans('common.delete')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

