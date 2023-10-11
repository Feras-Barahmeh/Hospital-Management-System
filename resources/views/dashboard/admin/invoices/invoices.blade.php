@php use App\Helpers\Enums\PaymentTypes;use Illuminate\Support\Str; @endphp
<tr>
        <td>{{ $invoice->id }}</td>
        <td>{{ $invoice->patient->name_patient }}</td>
        <td>{{ $invoice->doctor->name }}</td>
        <td>{{ $invoice->assistant->name }}</td>
        <td>{{ Str::limit($invoice->department->name, 10) }}</td>
        <td>{{ $invoice->price_assistant }}</td>
        <td>{{ $invoice->discount_amount }}</td>
        <td>{{ $invoice->tax_rate }}%</td>
        <td>{{ $invoice->tax_amount }}</td>
        <td>{{ $invoice->total_with_tax }}</td>
        <td class="text-center">
                @if($invoice->payment_type === PaymentTypes::Cash->value)
                        <span class="badge badge-success-transparent">{{ PaymentTypes::Cash->name }}</span>
                @else
                        <span class="badge badge-danger-transparent">{{ PaymentTypes::Later->name }}</span>
                @endif
        </td>
        <td>{{ $invoice->invoice_date}}</td>
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
                                <a href="{{ route('admin.invoices-assistants.edit',  $invoice->id) }}"
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
@include('dashboard.admin.invoices.delete')
