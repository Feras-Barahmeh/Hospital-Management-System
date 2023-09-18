
<div class="modal fade" id="delete{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="post">
                {{ method_field('delete') }}
                @csrf
                <div class="modal-body">
                    <h5>{{'are you sure'}}</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pl-10 pr-10 pt-1 pb-1" data-dismiss="modal">{{trans('common.close')}}</button>
                    <button type="submit" class="btn btn-danger pl-10 pr-10 pt-1 pb-1">{{trans('common.delete')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>



