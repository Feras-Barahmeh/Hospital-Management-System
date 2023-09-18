<details class="multiple-select select2">
    <summary>{{ __('dashboard/doctors.select_appointments') }}</summary>
    <div class="multiple-select-dropdown">
        @foreach($appointments as $appointment)
            @if($appointment->name != null)
                <label>
                    <input type="checkbox" hidden name="appointments[]"
                           {{ in_array($appointment->name, old('appointments', [])) ? 'checked' : '' }}
                           value="{{ $appointment->name }}">
                    <span class="content">{{ $appointment->name }}</span>
                </label>
            @endif
        @endforeach
    </div>
</details>
