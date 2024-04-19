<datalist id="<?= @$input_id ?>" form="<?= @$input_form ?>">
  <?php if (isset($options) && is_array($options)) : ?>
    <?php foreach ($options as $value => $label) : ?>
      <?php if (is_string($label)) : ?>
        <option value="<?= $value ?>">
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endif; ?>
</datalist>