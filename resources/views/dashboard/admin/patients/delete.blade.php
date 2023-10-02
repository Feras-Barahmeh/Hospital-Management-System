<div class="modal fade" id="delete{{ $patient->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title"
                                    id="exampleModalLabel">{{ __('dashboard/patients.delete_patient')  }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                </button>
                        </div>

                        <form action="{{ route('admin.patients.destroy', $patient->id) }}" method="post">
                                {{ method_field('delete') }}
                                @csrf
                                <div class="modal-body mt-0">
                                        <h5>
                                                {{ __('common.are_you_sure_delete') }}
                                                <strong class="text-danger d-inline-block">{{ $patient->name_patient }}</strong>
                                        </h5>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary pl-10 pr-10 pt-1 pb-1"
                                                data-dismiss="modal">{{__('common.close')}}</button>
                                        <button type="submit"
                                                class="btn btn-outline-danger pl-lg-4 pr-lg-4 pt-1 pb-1">{{__('common.delete')}}</button>
                                </div>
                        </form>
                </div>
        </div>
</div>




