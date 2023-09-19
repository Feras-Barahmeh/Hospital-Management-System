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
    <td class="text-center">
        <a class="modal-effect btn btn-sm btn-info"
           href="#edit{{$doctor->id}}"
           data-effect="effect-scale"
           data-toggle="modal">
            <i class="las la-pen"></i>
        </a>

        <a class="modal-effect btn btn-sm btn-danger"
           data-effect="effect-scale"
           href="#delete{{$doctor->id}}"
           data-toggle="modal" >
            <i class="las la-trash"></i>
        </a>

    </td>
</tr>
@include('dashboard.admin.doctors.edit')
@include('dashboard.admin.doctors.delete')
