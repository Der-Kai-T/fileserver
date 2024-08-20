<div class="form-group">
    @if(!isset($label))
        @php($label = __($attribute))
    @endif


    @if(isset($label) && strlen($label) > 0)
        <label
            class="col-form-label"
            for="{{ $attribute }}"
            >
            {{ $label }}
            {!! isset($required) ? "" : "<span class='form-label-annotation'>optional</span>" !!}
        </label>
    @endif
    <input
        {{isset($required) ? "required" : "" }}
        type="{{  $type ?? "text"}}"
        class="form-control {{ $class ?? "" }}"
        name="{{ $attribute }}"
        id="{{ $attribute }}"
        list="{{ $attribute }}-list"
        value="{!!  strip_tags(old($attribute, $model->$attribute ?? "")) !!}"
        {{isset($step) ? "step=".$step : "" }}
        {{isset($min) ? "min=".$min : "" }}
        {{isset($max) ? "max=".$max : "" }}
        {{isset($inputmode) ? "inputmode=".$inputmode : "" }}
        @if(isset($onchange))
            onchange = "{{ $onchange }}"
        @endif

        @if(isset($oninput))
            oninput = "{{ $oninput }}"
        @endif

        {{isset($noautocomplete) ? "autocomplete='off'" : ""}}
    >

    @error($attribute)
    <div class="error-message">
        {{ $message }}
    </div>
    @enderror
</div>
