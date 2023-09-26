@if( isset($servicesInPackage) )

      @foreach($servicesInPackage as $key => $assistantPackage)

            <tr>
                  <td class="text-success">{{  $loop->index + 1  }}</td>

                  <td class="">
                        <label for="assistants" class="w-100">
                              <input type="text" name="" id=""
                                     class="form-control " readonly
                                     value="{{ $assistantPackage->assistant->name }}">
                        </label>
                  </td>

                  <td>
                        <label class="w-100">
                              <input type="number"  class="form-control"
                                     value="{{ $assistantPackage->qty }}"
                                     placeholder='Enter Qty'
                                     readonly
                                     step="0" min="0"/>
                        </label>

                        @if ($errors->has('qty'))
                              <div class="text-danger">{{ $errors->first('qty') }}</div>
                        @endif
                  </td>

                  <td>
                        <label class="w-100">
                              <input type="number" value="{{ $assistantPackage->assistant->price }}"

                                     placeholder='Enter Unit Price' class="form-control price m-0"
                                     step="0.00" min="0" readonly/>
                        </label>
                  </td>

                  <td>

                        <label class="w-100">
                              <input type="number"  class="form-control total"
                                     value="{{ $assistantPackage->totalPriceService }}"
                                     placeholder='0.00'
                                     readonly/>
                        </label>

                  </td>
                  <td class="d-flex nowrap justify-content-center align-items-center border-0 pt-4 pb-0 gap-5">
                        <button id="add_row" type="button"
                                wire:click="edit({{ $key }})"
                                class="badge badge-info  border-0 pl-10 pr-10 pt-1 pb-1 w-50">
                              <i class="fa fa-edit"></i>
                        </button>
                        <button id='delete_row' type="button"
                                wire:click="delete({{ $key }})"
                                class="badge badge-danger border-0  pl-10 pr-10 pt-1 pb-1 w-50">
                              <i class="fa fa-trash"></i>
                        </button>
                  </td>
            </tr>
      @endforeach
@endif

