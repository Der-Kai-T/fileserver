<div class="form-check form-check-inline">
    <input
        class="form-check-input {{ $class ?? "" }}"
        type="radio"
        name="{{$name}}"
        id="{{$name}}_{{$value}}"
        value="{{$value}}"
        @if(isset($onchange))
            onchange = "{{ $onchange }}"
        @endif

        @if(isset($oninput))
            oninput = "{{ $oninput }}"
        @endif

        @if(isset($checked) && $checked == "1")
            checked
        @endif
        {{isset($required) ? "required" : "" }}
    >
    @if(isset($label) && strlen($label) > 0)
        <label
            class="form-check-label"
            for="{{ $name }}_{{$value}}">
            {{ $label }}
            {!! isset($required) ? "" : "<span class='form-label-annotation'>optional</span>" !!}
        </label>
    @endif
</div>
