@php use App\Helpers\Enums\Properties; @endphp
<tr>
        <td>{{ $ambulance->id   }}</td>
        <td>{{ $ambulance->car_number   }}</td>
        <td>{{ $ambulance->year_made   }}</td>
        <td>{{ $ambulance->driver_license_number   }}</td>
        <td>{{ $ambulance->driver_name   }}</td>
        <td>{{ $ambulance->driver_phone   }}</td>
        <td>{{ $ambulance->car_model   }}</td>
        <td class="text-center">
                @if($ambulance->property)
                        <span class="badge badge-success-transparent">{{ Properties::Owned->name }}</span>
                @else
                        <span class="badge badge-warning-transparent">{{ Properties::Rented->name }}</span>
                @endif
        </td>
        <td class="text-center">
                @if($ambulance->note)
                        {{ Str::limit($ambulance->note, 25) }}
                @else
                        <span class="badge badge-info-transparent">{{ __('common.without_noting') }}</span>
                @endif
        </td>
        <td class="text-center">
                @if( $ambulance->is_available)
                        <span class="badge badge-success-transparent">{{ __('dashboard/ambulances.available') }}</span>
                @else
                        <span class="badge badge-danger-transparent">{{ __('dashboard/ambulances.not_available') }}</span>
                @endif
        </td>
        <td>{{ $ambulance->created_at->diffForHumans()   }}</td>
        <td>{{ $ambulance->updated_at->diffForHumans()   }}</td>
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
                                <a href="{{ route('admin.ambulances.edit',  $ambulance->id) }}"
                                   class="dropdown-item">
                                        <i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;
                                        {{ __('common.edit') }}
                                </a>

                                {{-- change status --}}
                                <a class="dropdown-item"
                                   href="#toggleavailable{{ $ambulance->id }}" data-toggle="modal"
                                   data-target="#toggleavailable{{$ambulance->id}}">
                                        <i class="text-warning ti-back-right"></i>&nbsp;&nbsp;
                                        {{ __('common.change_status') }}
                                </a>

                                {{-- delete --}}
                                <a class="dropdown-item"
                                   href="#delete{{$ambulance->id}}" data-toggle="modal"
                                   data-target="#delete{{$ambulance->id}}">
                                        <i class="text-danger ti-trash"></i>
                                        &nbsp;&nbsp;
                                        {{ __('common.delete') }}
                                </a>
                        </div>
                </div>

        </td>
</tr>
@include('dashboard.admin.ambulances.delete')
@include('dashboard.admin.ambulances.toggle-available')
