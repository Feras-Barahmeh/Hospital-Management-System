
<div class="modal fade" id="changepassword{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('common.change_pass') . ' ' }}

                    <strong class="text-info">
                        {{$doctor->name}}
                    </strong>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="{{ route('admin.doctors.reset-password') }}" method="post" class="w-100">
                @csrf
                {{-- doctor id --}}
                <input type="hidden" name="id" value="{{$doctor->id}}">
                <div class="modal-body w-100 mt-0">
                    {{-- new password --}}
                    <div class="form-group w-100">
                        <label for="new_password" class="text-center">{{ trans('common.change_pass') }}</label>
                        <input type="password"
                               class="form-control"
                               id="new_password"
                               show-password="{{ __('common.show') }}"
                               name="new_password"
                               placeholder="{{ trans('common.new_pass') }}">
                    </div>
                    {{-- confirm password --}}
                    <div class="form-group w-100">
                        <label for="confirm_password" class="text-center">{{ trans('common.confirm_new_pass') }}</label>
                        <input type="password"
                               name="confirm_password"
                               class="form-control"
                               id="confirm_password"
                               show-password="{{ __('common.show') }}"
                               placeholder="{{ trans('common.confirm_new_pass') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pl-10 pr-10 pt-1 pb-1" data-dismiss="modal">{{trans('common.close')}}</button>
                    <button type="submit" class="btn btn-danger pl-10 pr-10 pt-1 pb-1">{{trans('common.save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
