@if($assistant->name)
        <tr>
                <td>{{ $assistant->id }}</td>

                <td>{{ $assistant->name }}</td>
                <td>{{ $assistant->price }}</td>
                <td>
                        @if($assistant->note)
                                {{ Str::limit($assistant->note, 25) }}
                        @else
                                <span class="badge badge-info">{{ __('dashboard/assistants.without_noting') }}</span>
                        @endif
                </td>

                <td class="position-relative d-flex justify-content-center">
                        <div class="dot-label bg-{{$assistant->status ? 'success':'danger'}} ml-1"></div>
                        <div class="">
                                @if($assistant->status)
                                        <span class="badge badge-success">
                                                {{  __('dashboard/assistants.enabled') }}
                                        </span>
                                @else
                                        <span class="badge badge-danger">
                                                {{  __('dashboard/assistants.not_enabled') }}
                                        </span>
                                @endif

                        </div>
                </td>

                <td>{{ $assistant->created_at->diffForHumans() }}</td>
                <td>{{ $assistant->updated_at->diffForHumans() }}</td>

                {{-- Operations --}}
                <td class="text-center">
                        <div class="dropdown">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">
                                        <i class="fas fa-caret-down mr-1"></i>
                                        <span> {{ __('common.operations') }} </span>
                                </button>
                                <div class="dropdown-menu tx-13">

                                        {{-- edit --}}
                                        <a href="#edit{{ $assistant->id }}"
                                           data-toggle="modal" data-target="#edit{{ $assistant->id }}"
                                           class="dropdown-item">
                                                <i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;
                                                {{ __('common.edit_info') }}
                                        </a>

                                        {{-- change status --}}
                                        <a class="dropdown-item"
                                           href="#togglestatus{{ $assistant->id }}" data-toggle="modal" data-target="#togglestatus{{$assistant->id}}">
                                                <i   class="text-warning ti-back-right"></i>&nbsp;&nbsp;
                                                {{ __('common.change_status') }}
                                        </a>

                                        {{-- delete --}}
                                        <a class="dropdown-item"
                                           href="#delete{{$assistant->id}}" data-toggle="modal" data-target="#delete{{$assistant->id}}">
                                                <i class="text-danger ti-trash"></i>
                                                &nbsp;&nbsp;
                                                {{ __('common.delete_info') }}
                                        </a>
                                </div>
                        </div>

                </td>
        </tr>
@endif
@include('dashboard.admin.assistants.edit')
@include('dashboard.admin.assistants.delete')
@include('dashboard.admin.assistants.toggle-status')
