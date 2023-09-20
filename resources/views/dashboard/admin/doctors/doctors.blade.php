<tr>
    <td>{{ $doctor->id }}</td>
    <td class="text-center">
        <label>
            <input class="form-check-input"
                   record-selected
                   name="row-select-slide[]"
                   type="checkbox" value="{{ $doctor->id }}" >
        </label>
    </td>
    <td class="text-center">
        {!! Blade::img($doctor, 'doctor_default.jpg') !!}
    </td>
    <td>{{ $doctor->name }}</td>
    <td>{{ $doctor->email }}</td>
    <td>{{ $doctor->phone }}</td>
    <td>{{ $doctor->price }}</td>
    <td class="position-relative">
        <div class="dot-label bg-{{$doctor->status ? 'success':'danger'}} ml-1"></div>
        <div class="">
            {{$doctor->status ? trans('dashboard/doctors.enabled') : trans('dashboard/doctors.not_enabled')}}
        </div>
    </td>
    <td>{{ $doctor->department->name }}</td>


    <td>{{ $doctor->created_at->diffForHumans() }}</td>

    {{-- Operations --}}
    <td class="text-center">
        <div class="dropdown">
            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">
                <i class="fas fa-caret-down mr-1"></i>
                <span> {{ __('common.operations') }} </span>
            </button>
            <div class="dropdown-menu tx-13">

                {{-- edit --}}
                <a href="{{ route('admin.doctors.edit', $doctor->id) }}"
                   class="dropdown-item">
                    <i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;
                    {{ __('common.edit_info') }}
                </a>

                {{-- change password --}}
                <a class="dropdown-item"
                   href="#changepassword{{ $doctor->id }}" data-toggle="modal" data-target="#changepassword{{$doctor->id}}">
                    <i   class="text-primary ti-key"></i>&nbsp;&nbsp;
                    {{ __('common.change_pass') }}
                </a>
                {{-- change status --}}
                <a class="dropdown-item"
                   href="#togglestatus{{ $doctor->id }}" data-toggle="modal" data-target="#togglestatus{{$doctor->id}}">
                    <i   class="text-warning ti-back-right"></i>&nbsp;&nbsp;
                    {{ __('common.change_status') }}
                </a>

                {{-- delete --}}
                <a class="dropdown-item"
                   href="#delete{{$doctor->id}}" data-toggle="modal" data-target="#delete{{$doctor->id}}">
                    <i class="text-danger ti-trash"></i>
                    &nbsp;&nbsp;
                    {{ __('common.delete_info') }}
                </a>
            </div>
        </div>

    </td>
</tr>
@include('dashboard.admin.doctors.change-password')
@include('dashboard.admin.doctors.delete')
@include('dashboard.admin.doctors.toggle-status')
