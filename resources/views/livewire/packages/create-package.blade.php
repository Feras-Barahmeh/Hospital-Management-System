<div class="card w-100" >
        <div class="card-header">
                <a href="{{ route('admin.packages.index') }}" class="btn btn-outline-primary ">
                        {{ __('dashboard/packages.to_packages') }}
                </a>

                {{-- errors --}}
                @if(session()->has('no_assistant'))
                        <div class="alert alert-danger mt-2 mb-2 ">
                                {{ session('no_assistant') }}
                        </div>
                @endif

                @if ($errors->any())
                        <div class="alert alert-danger mt-2 box-shadow">
                                <ul class="mb-1 ">
                                        @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                        @endforeach
                                </ul>
                        </div>
                @endif

                {{-- errors --}}
        </div>

        <div class="card-body">

                <form wire:submit.prevent="saveAndUnloadPackage()" class="w-100">


                        <div class="row">
                                <div class="input-group mb-1">
                        <span class="input-group-text" id="addon-wrapping">
                              {{__('dashboard/packages.name_package')}}
                        </span>

                                        <input type="text" class="form-control"
                                               wire:Keyup="setNamePackage($event.target.value)"
                                               wire:model="namePackage "
                                               placeholder="{{ __('dashboard/packages.enter_name_package') }}" aria-label="package_name"
                                               autofocus
                                               aria-describedby="addon-wrapping">
                                        <span class="input-group-text"
                                              id="addon-wrapping">
                              {{ __('dashboard/packages.note_package') }}
                        </span>
                                        <input type="text" class="form-control"
                                               wire:Keyup="setDescriptionPackage($event.target.value)"
                                               wire:model="descriptionPackage"
                                               placeholder=" {{ __('dashboard/packages.note_package') }}"
                                               aria-label="description"
                                               aria-describedby="addon-wrapping">
                                </div>
                        </div>


                        <div class="row clearfix">
                                <div class="col-9 col-md-9 pl-0 pr-0">
                                        <table class="table table-bordered table-hover" id="tab_logic">
                                                <thead>
                                                <tr>
                                                        <th class="text-center"> #</th>
                                                        <th class="text-center"> {{ __('dashboard/packages.service') }}</th>
                                                        <th class="text-center"> {{ __('dashboard/packages.qty') }}</th>
                                                        <th class="text-center">  {{ __('dashboard/packages.price') }} </th>
                                                        <th class="text-center"> {{ __('dashboard/packages.total') }}</th>
                                                        <th class="text-center"> {{ __('common.operations') }}</th>
                                                </tr>
                                                </thead>

                                                <tbody>

                                                {{--  default row --}}
                                                @include('livewire.packages.default-row')

                                                {{-- chosed row --}}
                                                @include('livewire.packages.assistants-package')


                                                </tbody>
                                        </table>
                                </div>

                                <div class="col-3 col-md-3">

                                        <table class="table table-bordered table-hover" id="tab_logic_total">
                                                <tbody>
                                                <tr>
                                                        <th class="text-center">{{ __('dashboard/packages.total') }}</th>
                                                        <td class="text-center">
                                                                <label for="sub_total">

                                                                        <input type="number" name='sub_total'
                                                                               wire:model="pricePackage"
                                                                               placeholder='0.00'
                                                                               class="form-control" id="sub_total"
                                                                               readonly/>
                                                                </label>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th class="text-center">{{  __('dashboard/packages.discount_amount')  }}</th>
                                                        <td class="text-center">
                                                                <div class="input-group mb-2 mb-sm-0">
                                                                        <label>
                                                                                <input type="number"
                                                                                       wire:Keyup="setDiscountAmount($event.target.value)"
                                                                                       wire:model="discountAmount"
                                                                                       class="form-control"
                                                                                       min="0"
                                                                                       placeholder="0.00">
                                                                        </label>

                                                                </div>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th class="text-center">
                                                                {{ __('dashboard/packages.tax') }}
                                                        </th>
                                                        <td class="text-cente d-flex align-items-center justify-content-between gap-5">
                                                                <label>
                                                                        <input type="number"
                                                                               wire:Keyup="setTax($event.target.value)"
                                                                               wire:model="tax"
                                                                               placeholder='0.00' class="form-control"/>
                                                                </label>
                                                                <div class="input-group-addon fs-name text-info">%</div>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th class="text-center">
                                                                {{ __('dashboard/packages.out_of_the_door') }}
                                                        </th>
                                                        <td class="text-center">
                                                                <label>
                                                                        <input type="number"
                                                                               wire:model="priceWithTax"
                                                                               placeholder='0.00'
                                                                               class="form-control" readonly/>
                                                                </label>
                                                        </td>
                                                </tr>
                                                </tbody>
                                        </table>

                                        <div class="row m-auto w-100">
                                                <button type="submit" class="btn btn-outline-info w-25 p-1  ">
                                                        {{ __('common.save') }}
                                                </button>
                                        </div>
                                </div>


                        </div>


                </form>
        </div>

</div>




