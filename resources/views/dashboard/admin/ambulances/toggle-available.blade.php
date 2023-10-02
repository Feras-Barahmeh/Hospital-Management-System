
<div class="modal fade" id="toggleavailable{{ $ambulance->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard/ambulances.hint_toggle_available') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="{{ route('admin.ambulances.toggle-available', $ambulance->id) }}" method="post">
                    {{ method_field('put') }}
                @csrf
                <div class="modal-body mt-0">
                    <input type="hidden" name="id" value="{{ $ambulance->id }}">
                    <h5>
                        {{ __('dashboard/ambulances.hint_toggle_available') }}
                        @if($ambulance->is_available)
                            <strong class="text-danger">
                                {{ __('dashboard/ambulances.not_available') }}
                            </strong>
                        @else
                            <strong class="text-success">
                                    {{ __('dashboard/ambulances.available') }}
                            </strong>
                        @endif
                        {{ __('common.for') }}
                        <strong class="text-info d-inline-block">{{ $ambulance->package_name }}</strong>
                    </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pl-10 pr-10 pt-1 pb-1" data-dismiss="modal">{{__('common.close')}}</button>
                    <button type="submit" class="btn btn-warning pl-10 pr-10 pt-1 pb-1">{{__('common.toggle')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>



