<details class="multiple-select select2">
    <summary>
        @if(isset($setAppointments) && count($setAppointments) > 0)
            {{ __('dashboard/doctors.the_chosen') }}:
            @foreach($setAppointments as $appointment)
                {{$appointment}}
            @endforeach
        @else
            {{ __('dashboard/doctors.select_appointments') }}
        @endif
    </summary>
    <div class="multiple-select-dropdown">
        @foreach($appointments as $appointment)
            @if($appointment->name != null)
                <label>
                    <input type="checkbox" hidden name="appointments[]"
                           {{ in_array($appointment->name, old('appointments', [])) ? 'checked' : '' }}
                               @checked( isset($setAppointments) && in_array($appointment->name, $setAppointments) )
                           value="{{ $appointment->name }}">
                    <span class="content">{{ $appointment->name }}</span>
                </label>
            @endif
        @endforeach
    </div>
</details>
