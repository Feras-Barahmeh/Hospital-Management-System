<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header d-flex justify-content-between">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                        {{ __('dashboard/insurances.add_insurance') }}
                                </h1>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                </button>
                        </div>

                        <div class="modal-body w-100">
                                <form class="form-horizontal w-100" action="{{ route('admin.insurances.store') }}"
                                      method="POST"
                                      autocomplete="off">
                                        @csrf
                                        <div class="form-group">
                                                <label for="name"
                                                       class="modal-label">{{ __('dashboard/insurances.name_insurance') }}</label>
                                                <input type="text" class="form-control" id="name"
                                                       name="company_name"
                                                       value="{{ old('company_name') }}"
                                                       autofocus
                                                       placeholder="{{ __('dashboard/insurances.name_insurance') }}">
                                        </div>

                                        <div class="form-group">
                                                <label for="code"
                                                       class="modal-label">{{ __('dashboard/insurances.code_insurance') }}</label>
                                                <input type="text" class="form-control"
                                                       value="{{ old('company_code') }}"
                                                       id="code" name="company_code"
                                                       placeholder="{{ __('dashboard/insurances.code_insurance') }}">
                                        </div>


                                        <div class="form-group">
                                                <label for="patient_discount_rate"
                                                       class="modal-label">{{ __('dashboard/insurances.patient_discount_rate') }}</label>
                                                <input type="number" class="form-control"
                                                       value="{{ old('patient_discount_rate') }}"
                                                       id="patient_discount_rate" name="patient_discount_rate"
                                                       placeholder="{{ __('dashboard/insurances.patient_discount_rate') }}">
                                        </div>


                                        <div class="form-group">
                                                <label for="company_rate"
                                                       class="modal-label">{{ __('dashboard/insurances.company_rate') }}</label>
                                                <input type="number" class="form-control"
                                                       value="{{ old('company_rate') }}"
                                                       id="company_rate" name="company_rate"
                                                       placeholder="{{ __('dashboard/insurances.company_rate') }}">
                                        </div>


                                        <div class="form-floating">
                                                <label for="floatingTextarea"
                                                       class="modal-label">{{ __('dashboard/insurances.note') }}</label>
                                                <textarea class="form-control" name="note"
                                                          placeholder="{{ __('dashboard/insurances.leave_note') }}"
                                                          id="floatingTextarea"
                                                          rows="5">{{ old('note') }}</textarea>
                                        </div>


                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary pl-10 pr-10 pt-1 pb-1"
                                                        data-bs-dismiss="modal">
                                                        {{ __('common.close') }}
                                                </button>
                                                <button type="submit"
                                                        class="btn btn-primary  pt-1 pb-1">
                                                        {{ __('common.add') }}
                                                </button>
                                        </div>
                                </form>
                        </div>

                </div>
        </div>
</div>
