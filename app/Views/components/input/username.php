<div class="<?= @$input_parent_div_Class ?>">
    <div class="form-group">
        <?= @$input_label ?>
        <div class="input-group">
            <input type="text" id="<?= @$input_id ?>" name="<?= @$input_name ?>" value="<?= @$input_value ?>" class="<?= @$input_classes ?>" form="<?= @$input_form ?>" title="<?= @$input_title ?>" placeholder="<?= @$input_placeHolder ?>" <?= @$input_attributes ?>>
            <div class="input-group-append">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
            </div>
        </div>
        <?= @$input_error ?>
    </div>
</div>