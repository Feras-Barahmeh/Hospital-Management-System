<div class="modal fade" id="edit{{ $assistant->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('dashboard/assistants.edit_assistant')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.assistants.update', $assistant->id) }}" method="post" class="w-100">
                {{ method_field('patch') }}
                @csrf
                <div class="modal-body w-100 d-flex flex-column">

                    {{-- name --}}
                    <div class="form-group">
                        <label for="name" class="modal-label">{{ __('dashboard/assistants.name_assistant') }}</label>
                        <input type="text" name="name" id="name" value="{{ $assistant->name }}" class="form-control">
                    </div>

                    {{-- price --}}
                    <div class="form-group">
                        <label for="price" class="modal-label">{{ __('dashboard/assistants.price_assistant') }}</label>
                        <input type="number" class="form-control" id="price" name="price"
                               value="{{ $assistant->price }}"
                               placeholder="{{ __('dashboard/assistants.price_assistant') }}">
                    </div>

                    {{-- note --}}
                    <div class="form-floating">
                        <label for="floatingTextarea" class="modal-label">
                            {{ __('dashboard/assistants.note') }}
                        </label>
                        <textarea class="form-control" name="note"
                                  placeholder="{{ __('dashboard/assistants.leave_note') }}"
                                  id="floatingTextarea" rows="10">{{ $assistant->note }}</textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pl-10 pr-10 pt-1 pb-1"
                            data-dismiss="modal">{{__('common.close')}}</button>
                    <button type="submit"
                            class="btn btn-outline-primary pl-lg-4 pr-lg-4 pt-1 pb-1">{{__('common.edit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
