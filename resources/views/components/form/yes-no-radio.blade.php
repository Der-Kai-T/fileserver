<h4>{{ $label }}</h4>

<?php
if(old($name) == 1){
    $checked_yes = 1;
    $checked_no = 0;
}elseif(old($name) == 1){
    $checked_no = 1;
    $checked_yes = 0;
}else{
    $checked_no = 0;
    $checked_yes = 0;
}
    ?>

<x-form.radiobutton-inline
    name="{{ $name }}"
    value="1"
    label="Ja"
    checked="{{$checked_yes}}"
    required
/>

<x-form.radiobutton-inline
    name="{{ $name }}"
    value="0"
    label="Nein"
    checked="{{$checked_no}}"
    required
/>
