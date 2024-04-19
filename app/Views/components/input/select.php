<div class="<?= @$input_parent_div_Class ?>">
    <div class="form-group">
        <?= @$input_label ?>
        <select name="<?= @$input_name ?>" id="<?= @$input_id ?>" class="<?= @$input_classes ?>" form="<?= @$input_form ?>" title="<?= @$input_title ?>" <?= @$input_attributes ?>>
            <option value=""><?= @$input_placeHolder ?></option> <!-- Empty option -->
            <?php foreach ($options as $value => $label) : ?>
                <?php if (is_array($label)) : ?>
                    <optgroup label="<?= $value ?>">
                        <?php foreach ($label as $subValue => $subLabel) : ?>
                            <option value="<?= $subValue ?>" <?= (isset($input_value) && $subValue == $input_value) ? 'selected' : '' ?>><?= $subLabel ?></option>
                        <?php endforeach; ?>
                    </optgroup>
                <?php else : ?>
                    <option value="<?= $value ?>" <?= (isset($input_value) && $value == $input_value) ? 'selected' : '' ?>><?= $label ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <?= @$input_error ?>
    </div>
</div>