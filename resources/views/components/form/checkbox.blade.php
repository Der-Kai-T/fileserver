<div class="form-check">
    <input
    type="checkbox"
    class="form-check-input"
    id="{{ $name }}"
    name="{{ $name }}"
    @if(isset($onchange))
        onchange = "{{ $onchange }}"
    @endif
    @if(isset($oninput))
        oninput = "{{ $oninput }}"
    @endif

        {{isset($required) ? "required" : "" }}

        <?php

        if (isset($checked) && $checked == "1") {
            echo "checked";
        }

        if(isset($value) && $value == 1){
            echo "checked";
        }
        ?>



    >
    <label
        class="form-check-label"
        for="{{ $name }}"
    >
        {{ $label }}
        {!! isset($required) ? "" : "<span class='form-label-annotation'>optional</span>" !!}
    </label>
    @error($name)
    <div class="error-message">
        {{ $message }}
    </div>
    @enderror
</div>
