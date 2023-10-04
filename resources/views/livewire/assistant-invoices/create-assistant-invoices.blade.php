@php use App\Helpers\Enums\PaymentTypes; @endphp
<div>
        <div class="card w-100">
                <div class="card-header">
                        <a href="{{ route('admin.invoices-assistants.index') }}"
                           class="btn btn-primary mt-3 mb-0 pl-lg-4 pr-lg-4 pt-1 pb-1 ">
                                <span>{{ __('common.back') }}</span>
                        </a>
                </div>

                <div class="card-body">
                        <form wire:submit.prevent="saveAssistantInvoice()"
                                autocomplete="off">
                                @csrf
                                <div class="row">
                                        <div class="form-group col-4">
                                                <label for="name_patient">{{ __('dashboard/invoices.name_patient') }}</label>
                                                <select class="form-control select2-no-search"
                                                        wire:change="setPatient($event.target.value)"
                                                        id="name_patient" name="name_patient">
                                                        <option value="">
                                                                {{ __('dashboard/invoices.select_name_patient') }}
                                                        </option>
                                                        @foreach($patients as $patient)
                                                                <option value="{{ $patient->id }}"
                                                                        @selected(old('name_patient') === $patient->id)>
                                                                        {{ $patient->name_patient }}
                                                                </option>
                                                        @endforeach
                                                </select>
                                        </div>

                                        <div class="form-group col-4">
                                                <label for="name_doctor">{{ __('dashboard/invoices.name_doctor') }}</label>
                                                <select class="form-control select2-no-search"
                                                        wire:change="setDoctor($event.target.value)"
                                                        id="name_doctor" name="name_doctor">
                                                        <option value="">
                                                                {{ __('dashboard/invoices.select_name_doctor') }}

                                                        </option>
                                                        @foreach($doctors as $doctor)
                                                                <option value="{{ $doctor->id }}"
                                                                        @selected(old('name_doctor') === $doctor->id)>
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

                                        <div class="form-group col-6">
                                                <label for="assistant_name">{{ __('dashboard/invoices.assistant_name') }}</label>

                                                <select class="form-control select2-no-search"
                                                        wire:change="setAssistant($event.target.value)"
                                                        id="assistant_name" name="assistant_name">
                                                        <option value="">
                                                                {{ __('dashboard/invoices.select_assistant_name') }}
                                                        </option>
                                                        @foreach($assistants as $assistant)
                                                                @if($assistant->name)
                                                                        <option value="{{ $assistant->id }}"
                                                                                @selected(old('assistant_name') === $assistant->id)>
                                                                                {{ $assistant->name }}
                                                                        </option>
                                                                @endif
                                                        @endforeach
                                                </select>
                                        </div>

                                        <div class="form-group col-6">
                                                <label for="price_assistant">{{ __('dashboard/invoices.price_assistant') }}</label>
                                                <input type="text" class="form-control"
                                                       id="price_assistant"
                                                       readonly
                                                       wire:model="assistantPrice"
                                                       placeholder="{{ __('dashboard/invoices.price_assistant') }}">
                                        </div>
                                </div>

                                <div class="row d-flex justify-content-center">
                                        <div class="form-group col-2">
                                                <label for="discount_amount">{{ __('dashboard/invoices.discount_amount') }}</label>
                                                <input type="number" class="form-control"
                                                       id="discount_amount"
                                                       wire:Keyup="setDiscountAmount($event.target.value)"
                                                       wire:model="discountAmount"
                                                       {{-- {{ __('dashboard/invoices.discount_amount') }} --}}
                                                       placeholder="0.00">
                                        </div>

                                        <div class="form-group col-2">
                                                <label for="tax_rate">{{ __('dashboard/invoices.tax_rate') }}</label>
                                                <input type="text" class="form-control"
                                                       id="tax_rate"
                                                       wire:Keyup="setTaxRate($event.target.value)"
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
                                                <label for="invoice_type">{{ __('dashboard/invoices.invoice_type') }}</label>
                                                <select class="form-control select2-no-search"
                                                        wire:change="setPaymentType($event.target.value)"
                                                        id="payment_type" name="payment_type">
                                                        <option value="{{ PaymentTypes::Cash->value }}">
                                                                {{ PaymentTypes::Cash->name }}
                                                        </option>
                                                        <option value="{{ PaymentTypes::Later->value }}">
                                                                {{ PaymentTypes::Later->name }}
                                                        </option>
                                                </select>
                                        </div>
                                </div>



                                <div class="row ml-auto">
                                        <button type="submit"
                                                class="btn btn-primary mt-3 mb-0 pl-lg-4 pr-lg-4 pt-1 pb-1 ">
                                                {{ __('common.add') }}
                                        </button>
                                </div>


                        </form>
                </div>

        </div>
</div>
