<select name="<?= isset($select_name) ? htmlspecialchars($select_name) : '' ?>" id="<?= isset($select_id) ? htmlspecialchars($select_id) : '' ?>" class="selectComponent <?= isset($select_classes) ? htmlspecialchars($select_classes) : '' ?>" <?= isset($select_multiple) && $select_multiple ? 'multiple' : '' ?> <?= isset($select_attribute) ? $select_attribute : '' ?>>
    <option <?= empty($option_selected) ? 'selected' : '' ?> value="" disabled><?= isset($option_label) ? htmlspecialchars($option_label) : '' ?></option>
    <?php $current_group = null; ?>
    <?php foreach ($options as $option) : ?>
        <?php if (isset($option['group']) && $option['group'] !== $current_group) : ?>
            <?php if ($current_group !== null) : ?>
                </optgroup>
            <?php endif; ?>
            <?php $current_group = $option['group']; ?>
            <optgroup label="<?= htmlspecialchars($current_group) ?>" title="<?= @$option['group_title'] ?>">
            <?php endif; ?>
            <option <?= isset($option_selected) && $option_selected == $option[$option_value] ? 'selected' : '' ?> value="<?= isset($option[$option_value]) ? htmlspecialchars($option[$option_value]) : '' ?>" title="<?= isset($option[$option_title]) ? htmlspecialchars($option[$option_title]) : '' ?>" data-parent="<?=@$option[$option_parent_id]?>"><?= isset($option[$option_text_field_name]) ? htmlspecialchars($option[$option_text_field_name]) : '' ?></option>
        <?php endforeach; ?>
        <?php if ($current_group !== null) : ?>
            </optgroup>
        <?php endif; ?>
</select>