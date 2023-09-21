
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    {{ trans('dashboard/assistants.add_assistant') }}
                </h1>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body w-100">
                <form class="form-horizontal w-100" action="{{ route('admin.assistants.store') }}" method="POST"
                      autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="modal-label">{{ __('dashboard/assistants.name_assistant') }}</label>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="{{ __('dashboard/assistants.name_assistant') }}">
                    </div>

                    <div class="form-group">
                        <label for="price" class="modal-label">{{ __('dashboard/assistants.price_assistant') }}</label>
                        <input type="number" class="form-control" id="price" name="price"
                               placeholder="{{ __('dashboard/assistants.price_assistant') }}">
                    </div>


                    <div class="form-floating">
                        <label for="floatingTextarea" class="modal-label">{{ __('dashboard/assistants.note') }}</label>
                        <textarea class="form-control" name="note"
                                  placeholder="{{ __('dashboard/assistants.leave_note') }}" id="floatingTextarea"
                                  rows="10"></textarea>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary pl-10 pr-10 pt-1 pb-1" data-bs-dismiss="modal">
                            {{ trans('common.close') }}
                        </button>
                        <button type="submit" class="btn btn-outline-primary pl-10 pr-10 pt-1 pb-1">
                            {{ trans('common.add') }}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
