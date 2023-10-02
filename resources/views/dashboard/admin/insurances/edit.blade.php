<div class="modal fade" id="edit{{ $insurance->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title"
                                    id="exampleModalLabel">{{__('dashboard/assistants.edit_assistant')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form action="{{ route('admin.insurances.update', $insurance->id) }}" method="post"
                              class="w-100">
                                {{ method_field('patch') }}
                                @csrf
                                <div class="modal-body w-100 d-flex flex-column">
                                        <div class="form-group">
                                                <label for="name"
                                                       class="modal-label">{{ __('dashboard/insurances.name_insurance') }}</label>
                                                <input type="text" class="form-control" id="name"
                                                       name="company_name"
                                                       value="{{ $insurance->company_name }}"
                                                       autofocus
                                                       placeholder="{{ __('dashboard/insurances.name_insurance') }}">
                                        </div>

                                        <div class="form-group">
                                                <label for="code"
                                                       class="modal-label">{{ __('dashboard/insurances.code_insurance') }}</label>
                                                <input type="text" class="form-control"
                                                       value="{{ $insurance->company_code }}"
                                                       id="code" name="company_code"
                                                       placeholder="{{ __('dashboard/insurances.code_insurance') }}">
                                        </div>


                                        <div class="form-group">
                                                <label for="patient_discount_rate"
                                                       class="modal-label">{{ __('dashboard/insurances.patient_discount_rate') }}</label>
                                                <input type="number" class="form-control"
                                                       value="{{ $insurance->patient_discount_rate }}"
                                                       id="patient_discount_rate" name="patient_discount_rate"
                                                       placeholder="{{ __('dashboard/insurances.patient_discount_rate') }}">
                                        </div>


                                        <div class="form-group">
                                                <label for="company_rate"
                                                       class="modal-label">{{ __('dashboard/insurances.company_rate') }}</label>
                                                <input type="number" class="form-control"
                                                       value="{{ $insurance->company_rate }}"
                                                       id="company_rate" name="company_rate"
                                                       placeholder="{{ __('dashboard/insurances.company_rate') }}">
                                        </div>


                                        <div class="form-floating">
                                                <label for="floatingTextarea"
                                                       class="modal-label">{{ __('dashboard/insurances.note') }}</label>
                                                <textarea class="form-control" name="note"
                                                          placeholder="{{ __('dashboard/insurances.leave_note') }}"
                                                          id="floatingTextarea"
                                                          rows="5">{{ $insurance->note }}</textarea>
                                        </div>

                                </div>

                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary pl-10 pr-10 pt-1 pb-1"
                                                data-dismiss="modal">{{__('common.close')}}</button>
                                        <button type="submit"
                                                class="btn btn-primary pl-lg-4 pr-lg-4 pt-1 pb-1">{{__('common.edit')}}</button>
                                </div>
                        </form>
                </div>
        </div>
</div>
