<details class="multiple-select select2">
    <summary>{{ __('dashboard/doctors.select_appointments') }}</summary>
    <div class="multiple-select-dropdown">
        <label>
            <input type="checkbox" hidden name="appointments[]"
                   {{ in_array('sunday', old('appointments', [])) ? 'checked' : '' }}
                   value="sunday">
            <span class="content">
                {{ __('days.sunday') }}
            </span>
        </label>
        <label>
            <input type="checkbox" hidden  name="appointments[]"
                   {{ in_array('monday', old('appointments', [])) ? 'checked' : '' }}
                   value="monday">
            <span class="content">
                {{ __('days.monday') }}
            </span>
        </label>
        <label>
            <input type="checkbox" hidden  name="appointments[]"
                   {{ in_array('tuesday', old('appointments', [])) ? 'checked' : '' }}
                   value="tuesday">
            <span class="content">
                {{ __('days.tuesday') }}
            </span>
        </label>
        <label>
            <input type="checkbox" hidden  name="appointments[]"
                   {{ in_array('wednesday', old('appointments', [])) ? 'checked' : '' }}
                   value="wednesday">
            <span class="content">
                {{ __('days.wednesday') }}
            </span>
        </label>
        <label>
            <input type="checkbox" hidden  name="appointments[]"
                   {{ in_array('thursday', old('appointments', [])) ? 'checked' : '' }}
                   value="thursday">
            <span class="content">
                {{ __('days.thursday') }}
            </span>
        </label>
        <label>
            <input type="checkbox" hidden  name="appointments[]"
                   {{ in_array('friday', old('appointments', [])) ? 'checked' : '' }}
                   value="friday">
            <span class="content">
                {{ __('days.friday') }}
            </span>
        </label>
        <label>
            <input type="checkbox" hidden  name="appointments[]"
                   {{ in_array('saturday', old('appointments', [])) ? 'checked' : '' }}
                   value="saturday">
            <span class="content">
                {{ __('days.saturday') }}
            </span>
        </label>

    </div>
</details>
