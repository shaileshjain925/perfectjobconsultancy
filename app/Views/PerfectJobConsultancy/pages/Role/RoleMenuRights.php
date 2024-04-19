<?php $this->section('card'); ?>
<form id="RoleMenuAccessRightsCreate">
    <div class="table-responsive">
        </fieldset>
        <table class="table table-bordered table-striped">
            <thead class="bg-secondary text-light">
                <tr>
                    <th>Menu</th>
                    <th>View</th>
                    <th>Create</th>
                    <th>Update</th>
                    <th>Delete</th>
                    <th>Export</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rights as $module_name => $menus_list) : ?>
                    <tr>
                        <th colspan="6" data-toggle="collapse" data-target=".<?= preg_replace('/\s+/', '', trim($module_name)) ?>" aria-expanded="false" aria-controls="<?= preg_replace('/\s+/', '', trim($module_name)); ?>">
                            <?= esc($module_name); ?>
                        </th>
                    </tr>
                    <tr class="collapse <?= preg_replace('/\s+/', '', trim($module_name)); ?>">
                        <td colspan="6">
                            <?php foreach ($menus_list as $key => $menu) : ?>
                                <?php
                                $row_id = preg_replace('/\s+/', '', trim($module_name)) . "-" . $key;
                                ?>
                                <input type="hidden" name="[<?= $row_id ?>][role_id]" value="<?= $menu['role_id'] ?>" />
                                <input type="hidden" name="[<?= $row_id ?>][menu_id]" value="<?= $menu['menu_id'] ?>" />
                                <div class="row" id="<?= $row_id ?>">
                                    <div class="col"><?= $menu['menu_name'] ?></div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" name="[<?= $row_id ?>][is_view]" type="checkbox" <?= $menu['is_view'] ? 'checked' : '' ?>>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" name="[<?= $row_id ?>][is_created]" type="checkbox" <?= $menu['is_created'] ? 'checked' : '' ?>>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" name="[<?= $row_id ?>][is_updated]" type="checkbox" <?= $menu['is_updated'] ? 'checked' : '' ?>>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" name="[<?= $row_id ?>][is_deleted]" type="checkbox" <?= $menu['is_deleted'] ? 'checked' : '' ?>>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" name="[<?= $row_id ?>][is_export]" type="checkbox" <?= $menu['is_export'] ? 'checked' : '' ?>>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </fieldset>
        <button type="submit" class="btn btn-primary float-right m-2 p-2">
            Save
        </button>

    </div>
</form>
<?php $this->endSection(); ?>
<?= view("Views/components/card/card") ?>
<script id="mainPageScript">
    var formId = "RoleMenuAccessRightsCreate";
    var method = "PUT";
    var CreateUpdateApiUrl = "<?=base_url(route_to('rolemenuapirightscreate-api'))?>";
    var ListPageUrl = "<?=base_url(route_to('rolelist'))?>";
</script>