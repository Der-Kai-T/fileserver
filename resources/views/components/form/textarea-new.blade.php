<div class="form-group">
    @if(!isset($label))
        @php($label = __($attribute))
    @endif
    <label
        class="col-form-label"
        for="{{ $attribute }}">
        {{ $label }}
        {!! isset($required) ? "" : "<span class='form-label-annotation'>optional</span>" !!}
    </label>
    <textarea
        {{isset($required) ? "required" : "" }}
        class="form-control {{ $class ?? "" }}"
        name="{{ $attribute }}"
        id="{{ $attribute }}"
        rows=" {{ $rows ?? "5" }}"
        {{isset($style) ? "style=".$style : "" }}
        {{isset($onchange) ? "onchange=".$onchange : "" }}
        {{isset($oninput) ? "oninput=".$oninput : "" }}
    >@if(isset($raw)){!!  old($attribute, $model->$attribute ?? "")  !!}@else{!!  strip_tags(old($attribute, $model->$attribute ?? ""))  !!}@endif</textarea>

    @error($attribute)
    <div class="error-message">
        {{ $message }}
    </div>
    @enderror
</div>
