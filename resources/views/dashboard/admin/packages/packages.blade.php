<tr>
        <td>{{ $package->id }}</td>
        <td>{{ $package->package_name }}</td>
        <td>
                @if($package->description)
                        {{ Str::limit($package->description, 25) }}
                @else
                        <span class="badge badge-info">{{ __('common.without_noting') }}</span>
                @endif
        </td>

        <td>{{ $package->total_before_discount }}</td>
        <td>{{ $package->total_after_discount }}</td>
        <td>{{ $package->discount_amount }}</td>
        <td>{{ $package->tax }}</td>
        <td>{{ $package->out_the_door_price }}</td>
        <td>{{ $package->assistants->count() }}</td>


        <td class="position-relative d-flex justify-content-center">
                <div class="dot-label bg-{{$package->status ? 'success':'danger'}} ml-1"></div>
                <div class="">
                        @if($package->status)
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

        <td>{{ $package->created_at->diffForHumans() }}</td>
        <td>{{ $package->updated_at->diffForHumans() }}</td>

        {{-- Operations --}}
        <td class="text-center">
                <div class="dropdown">
                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">
                                <i class="fas fa-caret-down mr-1"></i>
                                <span> {{ __('common.operations') }} </span>
                        </button>
                        <div class="dropdown-menu tx-13">

                                {{-- edit --}}
                                <a href="{{ route('admin.packages.edit',  $package->id) }}"
                                   class="dropdown-item">
                                        <i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;
                                        {{ __('common.edit') }}
                                </a>

                                {{-- change status --}}
                                <a class="dropdown-item"
                                   href="#togglestatus{{ $package->id }}" data-toggle="modal" data-target="#togglestatus{{$package->id}}">
                                        <i   class="text-warning ti-back-right"></i>&nbsp;&nbsp;
                                        {{ __('common.change_status') }}
                                </a>

                                {{-- delete --}}
                                <a class="dropdown-item"
                                   href="#delete{{$package->id}}" data-toggle="modal" data-target="#delete{{$package->id}}">
                                        <i class="text-danger ti-trash"></i>
                                        &nbsp;&nbsp;
                                        {{ __('common.delete') }}
                                </a>
                        </div>
                </div>

        </td>
</tr>

@include('dashboard.admin.packages.delete')
@include('dashboard.admin.packages.toggle-status')
