
<div class="modal fade" id="togglestatus{{ $package->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard/packages.toggle_status') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="{{ route('admin.packages.toggle-status') }}" method="post">
                @csrf
                <div class="modal-body mt-0">
                    <input type="hidden" name="id" value="{{ $package->id }}">
                    <h5>
                        {{ __('dashboard/packages.hint_toggle_status') }}
                        @if($package->status)
                            <strong class="text-danger">
                                {{ __('common.not_enabled') }}
                            </strong>
                        @else
                            <strong class="text-success">
                                {{ __('common.enabled') }}
                            </strong>
                        @endif
                        {{ __('common.for') }}
                        <strong class="text-info d-inline-block">{{ $package->package_name }}</strong>
                    </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pl-10 pr-10 pt-1 pb-1" data-dismiss="modal">{{__('common.close')}}</button>
                    <button type="submit" class="btn btn-danger pl-10 pr-10 pt-1 pb-1">{{__('common.change')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>



