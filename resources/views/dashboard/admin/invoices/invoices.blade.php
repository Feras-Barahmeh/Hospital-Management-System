<tr>
        <td>{{ $invoice->id }}</td>

        <td>{{ $invoice->invoice_date}}</td>
        <td>{{ $invoice->patients->name_patient }}</td>
        <td>{{ $invoice->doctors->name }}</td>
        <td>{{ $invoice->assistants->name }}</td>
        <td>{{ $invoice->departments->name }}</td>
        <td>{{ $invoice->price_assistant }}</td>
        <td>{{ $invoice->discount_amount }}</td>
        <td>{{ $invoice->tax_rate }}%</td>
        <td>{{ $invoice->tax_amount }}</td>
        <td>{{ $invoice->total_with_tax }}</td>
        <td>{{ $invoice->created_at->diffForHumans()   }}</td>
        <td>{{ $invoice->updated_at->diffForHumans()   }}</td>

        {{-- Operations --}}
        <td class="text-center">
                <div class="dropdown">
                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm"
                                data-toggle="dropdown" type="button">
                                <i class="fas fa-caret-down mr-1"></i>
                                <span> {{ __('common.operations') }} </span>
                        </button>
                        <div class="dropdown-menu tx-13">

                                {{-- edit --}}
                                <a href="{{ route('admin.ambulances.edit',  $invoice->id) }}"
                                   class="dropdown-item">
                                        <i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;
                                        {{ __('common.edit') }}
                                </a>

                                {{-- delete --}}
                                <a class="dropdown-item"
                                   href="#delete{{$invoice->id}}" data-toggle="modal"
                                   data-target="#delete{{$invoice->id}}">
                                        <i class="text-danger ti-trash"></i>
                                        &nbsp;&nbsp;
                                        {{ __('common.delete') }}
                                </a>
                        </div>
                </div>
        </td>
</tr>
