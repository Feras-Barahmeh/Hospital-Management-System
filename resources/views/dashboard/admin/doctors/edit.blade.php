{{-- Modal --}}
<div class="modal fade" id="edit{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('dashboard/doctors.edit_doctor')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="post">
                {{ method_field('patch') }}
                @csrf
                <div class="modal-body">
                    <label for="name">{{trans('dashboard/doctors.name_doctor')}}</label>
                    <input type="hidden" name="id" value="{{ $doctor->id }}">
                    <input type="text" id="name" name="name" value="{{ $doctor->name }}" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pl-10 pr-10 pt-1 pb-1" data-dismiss="modal">{{trans('common.close')}}</button>
                    <button type="submit" class="btn btn-primary pl-10 pr-10 pt-1 pb-1">{{trans('common.edit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
