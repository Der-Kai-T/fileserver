<div class="form-group"
     id="{{ $name }}_group"
>

<label
    class="col-form-label"
    for="{{ $name }}"
>
    {{ $label }}
    {!! isset($required) ? "" : "<span class='form-label-annotation'>optional</span>" !!}
</label>

<select
    class="form-control"
    name="{{ $name }}"
    id="{{ $name }}"

>
    <x-bkd.form.option.placeholder />
    @foreach($data as $d)
        <option value="{{ $d->id }}">{{ $d->name }}</option>
    @endforeach

</select>

</div>
