<tr>
    <td>{{ $department->id }}</td>
    <td>
        <a href="{{ route('admin.departments.show', $department->id) }}" class="text-white">
            {{ $department->name }}
        </a>
    </td>
    <td>{{ Str::limit($department->description, 25) }}</td>
    <td>{{ $department->created_at }}</td>
    <td class="text-center">
        <a class="modal-effect btn btn-sm btn-info"
           description="edit"
           href="#edit{{$department->id}}"
           data-effect="effect-scale"
           data-toggle="modal">
            <i class="las la-pen"></i>
        </a>

        <a class="modal-effect btn btn-sm btn-danger"
           data-effect="effect-scale"
           description="delete"
           href="#delete{{$department->id}}"
           data-toggle="modal" >
            <i class="las la-trash"></i>
        </a>

    </td>
</tr>
@include('dashboard.admin.departments.edit')
@include('dashboard.admin.departments.delete')
