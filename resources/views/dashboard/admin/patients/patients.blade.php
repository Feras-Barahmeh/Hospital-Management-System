
<tr>
        <td>{{ $patient->id   }}</td>
        <td>{{ $patient->name_patient   }}</td>
        <td>{{ $patient->email   }}</td>
        <td>{{ $patient->phone_number   }}</td>
        <td>{{ $patient->sex   }}</td>
        <td>{{ $patient->BOD   }}</td>
        <td>{{ $patient->blood_type   }}</td>
        <td>{{  Str::limit($patient->address, 25)  }}</td>

        <td>{{ $patient->created_at->diffForHumans()   }}</td>
        <td>{{ $patient->updated_at->diffForHumans()   }}</td>
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
                                <a href="{{ route('admin.patients.edit',  $patient->id) }}"
                                   class="dropdown-item">
                                        <i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;
                                        {{ __('common.edit') }}
                                </a>

                                {{-- delete --}}
                                <a class="dropdown-item"
                                   href="#delete{{$patient->id}}" data-toggle="modal"
                                   data-target="#delete{{$patient->id}}">
                                        <i class="text-danger ti-trash"></i>
                                        &nbsp;&nbsp;
                                        {{ __('common.delete') }}
                                </a>
                        </div>
                </div>

        </td>
</tr>
@include('dashboard.admin.patients.delete')
