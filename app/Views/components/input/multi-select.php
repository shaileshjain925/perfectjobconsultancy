<div class="<?= @$input_parent_div_Class ?>">
    <div class="form-group">
        <?= @$input_label ?>
        <select name="<?= @$input_name ?>[]" id="<?= @$input_id ?>" class="<?= @$input_classes ?>" form="<?= @$input_form ?>" title="<?= @$input_title ?>" multiple <?= @$input_attributes ?>>
            <option value=""><?= @$input_placeholder ?></option> <!-- Empty option -->
            <?php foreach ($options as $groupLabel => $groupOptions) : ?>
                <optgroup label="<?= $groupLabel ?>">
                    <?php foreach ($groupOptions as $value => $label) : ?>
                        <option value="<?= $value ?>" <?= (is_array($input_value) && in_array($value, $input_value)) ? 'selected' : '' ?>><?= $label ?></option>
                    <?php endforeach; ?>
                </optgroup>
            <?php endforeach; ?>
        </select>
        <?= @$input_error ?>
    </div>
</div>