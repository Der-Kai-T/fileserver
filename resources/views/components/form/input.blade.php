<div class="form-group">
    @if(isset($label) && strlen($label) > 0)
        <label
            class="col-form-label"
            for="{{ $name }}">
            {{ $label }}
            {!! isset($required) ? "" : "<span class='form-label-annotation'>optional</span>" !!}
        </label>
    @endif
    <input
        {{isset($required) ? "required" : "" }}
        type="{{  $type ?? "text"}}"
        class="form-control {{ $class ?? "" }}"
        name="{{ $name }}"
        id="{{ $name }}"
        list="{{ $name }}-list"
        value="{!!  strip_tags(old($name, $value ?? "")) !!}"
        {{isset($step) ? "step=".$step : "" }}
        {{isset($min) ? "min=".$min : "" }}
        {{isset($max) ? "max=".$max : "" }}
        @if(isset($onchange))
            onchange = "{{ $onchange }}"
        @endif

        @if(isset($oninput))
            oninput = "{{ $oninput }}"
        @endif

        {{isset($noautocomplete) ? "autocomplete='off'" : ""}}
    >

    @error($name)
    <div class="error-message">
        {{ $message }}
    </div>
    @enderror
</div>
