<tr >
      <td>#</td>

      <td>

            <label for="assistants" class="w-100">
                  <select class="form-control select2 w-100" id="assistants"
                          wire:change="replenish($event.target.value)"
                          wire:model="defaultService">
                        <option value="default"  disabled selected>
                              {{ __('dashboard/packages.chosen_services') }}
                        </option>
                        @foreach($assistants as $assistant)
                              <option value="{{ $assistant->id }}">
                                    {{ $assistant->name }}
                              </option>
                        @endforeach
                  </select>
            </label>
      </td>


      <td>
            <label class="w-100">
                  <input type="number"  class="form-control"
                         wire:Keyup="setQtyService($event.target.value)"
                         wire:model="quantity"
                         placeholder='Enter Qty'
                         step="0" min="0"/>
            </label>

            @if ($errors->has('qty'))
                  <div class="text-danger">{{ $errors->first('qty') }}</div>
            @endif
      </td>

      <td>
            <label class="w-100">
                  <input type="number" placeholder='Unit Price'
                         wire:model="priceService"
                         class="form-control price m-0"
                         step="0.00" min="0" readonly/>
            </label>
      </td>

      <td>

            <label class="w-100">
                  <input type="number"  class="form-control total"
                         wire:model="totalPriceService"
                         readonly/>
            </label>

      </td>
      <td class="d-flex nowrap justify-content-center align-items-center border-0 pt-4 pb-0 gap-5">
            <button id="add_row" type="button"
                    wire:click="insertServiceToPackage"
                    class="badge badge-success  border-0 pl-10 pr-10 pt-1 pb-1 w-50">
                  <i class="fa fa-plus"></i>
            </button>

      </td>
</tr>
