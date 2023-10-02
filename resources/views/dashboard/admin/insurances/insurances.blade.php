<tr>
        <td>{{ $insurance->id }}</td>
        <td>{{ $insurance->company_code }}</td>
        <td>{{ $insurance->patient_discount_rate }}</td>
        <td>{{ $insurance->company_rate }}</td>
        <td>
                {{ $insurance->company_name }}
        </td>

        <td>
                @if($insurance->note)
                        {{ Str::limit($insurance->note, 25) }}
                @else
                        <span class="badge badge-info">{{ __('common.without_noting') }}</span>
                @endif
        </td>


        <td class="position-relative d-flex justify-content-center">
                <div class="dot-label bg-{{$insurance->status ? 'success':'danger'}} ml-1"></div>
                <div class="">
                        @if($insurance->status)
                                <span class="badge badge-success">
                                                {{ __('dashboard/assistants.enabled')  }}
                                        </span>
                        @else
                                <span class="badge badge-danger">
                                                {{ __('dashboard/assistants.not_enabled')  }}
                                        </span>
                        @endif
                </div>
        </td>

        <td>{{ $insurance->created_at->diffForHumans() }}</td>
        <td>{{ $insurance->updated_at->diffForHumans() }}</td>

        <td class="text-center">
                <a class="modal-effect btn btn-sm btn-outline-info"
                   description="edit"
                   href="#edit{{$insurance->id}}"
                   data-effect="effect-scale"
                   data-toggle="modal">
                        <i class="las la-pen"></i>
                </a>

                <a class="modal-effect btn btn-sm btn-outline-warning"
                   description="toggle"
                   href="#togglestatus{{$insurance->id}}"
                   data-effect="effect-scale"
                   data-toggle="modal">
                        <i class="ti-back-right"></i>
                </a>

                <a class="modal-effect btn btn-sm btn-outline-danger"
                   data-effect="effect-scale"
                   description="delete"
                   href="#delete{{$insurance->id}}"
                   data-toggle="modal">
                        <i class="las la-trash"></i>
                </a>

        </td>
</tr>
@include('dashboard.admin.insurances.edit')
@include('dashboard.admin.insurances.delete')
@include('dashboard.admin.insurances.toggle-status')
