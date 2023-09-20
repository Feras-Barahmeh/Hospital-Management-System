{{-- Modal --}}
<div class="modal fade" id="edit{{ $department->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('dashboard/departments.edit_department')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.departments.update', $department->id) }}" method="post" class="w-100">
                {{ method_field('patch') }}
                @csrf
                <div class="modal-body w-100 d-flex flex-column">
                    <input type="hidden" name="id" value="{{ $department->id }}">
                    <div class="form-group">
                        <label for="name">{{ trans('dashboard/departments.name_department') }}</label>
                        <input type="text" name="name" id="name" value="{{ $department->name }}" class="form-control">
                    </div>

                    <div class="form-floating">
                        <label for="floatingTextarea">{{ __('dashboard/departments.description') }}</label>
                        <textarea class="form-control" name="description"
                                  placeholder="{{ __('dashboard/departments.leave_description') }}"
                                  id="floatingTextarea" rows="10">{{ $department->description }}</textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pl-10 pr-10 pt-1 pb-1" data-dismiss="modal">{{trans('common.close')}}</button>
                    <button type="submit" class="btn btn-primary pl-10 pr-10 pt-1 pb-1">{{trans('common.edit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
