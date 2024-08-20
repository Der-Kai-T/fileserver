<div class="form-group">
    <label
        class="col-form-label"
        for="{{ $name }}">
        {{ $label }}
        {!! isset($required) ? "" : "<span class='form-label-annotation'>optional</span>" !!}
    </label>
    <textarea
        {{isset($required) ? "required" : "" }}
        class="form-control {{ $class ?? "" }}"
        name="{{ $name }}"
        id="{{ $name }}"
        rows=" {{ $rows ?? "5" }}"
        {{isset($style) ? "style=".$style : "" }}
        {{isset($onchange) ? "onchange=".$onchange : "" }}
        {{isset($oninput) ? "oninput=".$oninput : "" }}
    >{{ old($name, $value ?? "") }}</textarea>

    @error($name)
    <div class="error-message">
        {{ $message }}
    </div>
    @enderror
</div>
