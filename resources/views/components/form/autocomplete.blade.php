<?php
    $buttons = \App\Models\AutocompleteButton::where("field", "=", $field)
    ->get();

?>


<div class="row">
@foreach($buttons as $button)
    <?php
        $onclick_event = "$('#$target').val('" . $button->value."').focus()";
        ?>
    <div
        class="col-lg-4 col-sm-12"
        style="margin-bottom: 1rem"
    >
        <span
            class="btn btn-xs bg-gradient-info"
            style="width: 100%; height: 100%"
            onclick="{{ $onclick_event }}"
        >
            {{ $button->value }}
        </span>
    </div>

@endforeach
</div>

