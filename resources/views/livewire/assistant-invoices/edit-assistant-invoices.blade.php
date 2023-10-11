<div>
        {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
        @php use App\Helpers\Enums\PaymentTypes; @endphp
        <div>
                <div class="card w-100">
                        <div class="card-header">
                                <a href="{{ route('admin.invoices-assistants.index') }}"
                                   class="btn btn-primary mt-3 mb-0 pl-lg-4 pr-lg-4 pt-1 pb-1 ">
                                        <span>{{ __('common.back') }}</span>
                                </a>


                                {{-- errors --}}
                                @if ($errors->any())
                                        <div class="alert alert-danger mt-2 box-shadow">
                                                <ul class="mb-1 ">
                                                        @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                        @endforeach
                                                </ul>
                                        </div>
                                @endif
                                {{-- end errors --}}
                        </div>

                        <div class="card-body">
                                <form wire:submit.prevent="updateAssistantInvoice()"
                                      autocomplete="off">
                                        @csrf
                                        <div class="row">
                                                <div class="form-group col-4">
                                                        <label for="name_patient">{{ __('dashboard/invoices.name_patient') }}</label>
                                                        <input type="text" class="form-control"
                                                               id="name_patient"
                                                               readonly
                                                               value="{{ $invoice->patient->name_patient }}"
                                                               placeholder="{{ __('dashboard/invoices.name_patient') }}">
                                                </div>

                                                <div class="form-group col-4">
                                                        <label for="name_doctor">{{ __('dashboard/invoices.name_doctor') }}</label>
                                                        <select class="form-control select2-no-search"
                                                                wire:change="setDoctor($event.target.value)"
                                                                id="name_doctor" name="name_doctor">

                                                                @foreach($doctors as $doctor)
                                                                        <option value="{{ $doctor->id }}"
                                                                                @selected(old('name_doctor') === $doctor->id || $doctor->id === $invoice->doctor_id)>
                                                                                {{ $doctor->name }}
                                                                        </option>
                                                                @endforeach
                                                        </select>

                                                </div>
                                                <div class="form-group col-4">
                                                        <label for="department_doctor">{{ __('dashboard/invoices.department_doctor') }}</label>
                                                        <input type="text" class="form-control"
                                                               id="department_doctor"
                                                               readonly
                                                               wire:model="doctorDepartment"
                                                               placeholder="{{ __('dashboard/invoices.department_doctor') }}">
                                                </div>
                                        </div>


                                        <div class="row">

                                                <div class="form-group col-4">
                                                        <label for="assistant_name">{{ __('dashboard/invoices.assistant_name') }}</label>
                                                        <input type="text" class="form-control"
                                                               id="assistant_name"
                                                               readonly
                                                               value=" {{ $invoice->assistant->name }}"
                                                               placeholder="{{ __('dashboard/invoices.assistant_name') }}">
                                                </div>

                                                <div class="form-group col-4">
                                                        <label for="price_assistant">{{ __('dashboard/invoices.price_assistant') }}</label>
                                                        <input type="text" class="form-control"
                                                               id="price_assistant"
                                                               readonly
                                                               wire:model="assistantPrice"
                                                               placeholder="{{ __('dashboard/invoices.price_assistant') }}">
                                                </div>

                                                <div class="form-group col-4">
                                                        <label for="down_payment">

                                                                @if($remainingAmount == 0)
                                                                        {!! __('dashboard/invoices.invoice_completed') !!}
                                                                @else
                                                                        {{ __('dashboard/invoices.down_payment') }}
                                                                        : {!! __('dashboard/invoices.not_recipient',  ['value'=>(string)$remainingAmount ] ) !!}
                                                                @endif
                                                        </label>
                                                        <input type="text" class="form-control"
                                                               id="down_payment"
                                                               @readonly($remainingAmount == 0)
                                                               wire:model="downPayment"
                                                               wire:change="setDownPayment($event.target.value)"
                                                               placeholder="{{ __('dashboard/invoices.down_payment') }}">
                                                </div>
                                        </div>

                                        <div class="row d-flex justify-content-center">
                                                <div class="form-group col-2">
                                                        <label for="discount_amount">{{ __('dashboard/invoices.discount_amount') }}</label>
                                                        <input type="number" class="form-control"
                                                               id="discount_amount"
                                                               wire:model="discountAmount"
                                                               readonly
                                                               {{-- {{ __('dashboard/invoices.discount_amount') }} --}}
                                                               placeholder="0.00">
                                                </div>

                                                <div class="form-group col-2">
                                                        <label for="tax_rate">{{ __('dashboard/invoices.tax_rate') }}</label>
                                                        <input type="text" class="form-control"
                                                               id="tax_rate"
                                                               readonly
                                                               wire:model="taxRate"
                                                               {{-- {{ __('dashboard/invoices.tax_rate') }} --}}
                                                               placeholder="0.00">
                                                </div>

                                                <div class="form-group col-2">
                                                        <label for="tax_amount">{{ __('dashboard/invoices.tax_amount') }}</label>
                                                        <input type="text" class="form-control"
                                                               id="tax_amount"
                                                               wire:model="taxAmount"
                                                               readonly
                                                               {{-- {{ __('dashboard/invoices.tax_amount') }} --}}
                                                               placeholder="0.00">
                                                </div>

                                                <div class="form-group col-3">
                                                        <label for="total_with_tax">{{ __('dashboard/invoices.total_with_tax') }}</label>
                                                        <input type="text" class="form-control"
                                                               id="total_with_tax"
                                                               wire:model="totalWithTax"
                                                               readonly
                                                               placeholder="{{ __('dashboard/invoices.total_with_tax') }}">
                                                </div>

                                                <div class="form-group col-2">
                                                        <label for="payment_type">{{ __('dashboard/invoices.invoice_type') }}</label>
                                                        <select class="form-control select2-no-search"
                                                                @readonly($remainingAmount == 0)
                                                                wire:change="setPaymentType($event.target.value)"
                                                                id="payment_type" name="payment_type">
                                                                <option value="{{ PaymentTypes::Cash->value }}"
                                                                        @selected($invoice->payment_type == PaymentTypes::Cash->value)>
                                                                        {{ PaymentTypes::Cash->name }}
                                                                </option>
                                                                <option value="{{ PaymentTypes::Later->value }}"
                                                                        @selected($invoice->payment_type == PaymentTypes::Later->value )>
                                                                        {{ PaymentTypes::Later->name }}
                                                                </option>
                                                        </select>
                                                </div>
                                        </div>


                                        <div class="row ml-auto">
                                                <button type="submit"
                                                        class="btn btn-primary mt-3 mb-0 pl-lg-4 pr-lg-4 pt-1 pb-1 ">
                                                        {{ __('common.edit') }}
                                                </button>
                                        </div>


                                </form>
                        </div>

                </div>
        </div>

</div>
