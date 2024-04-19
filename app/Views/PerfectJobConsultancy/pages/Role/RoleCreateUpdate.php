<?php $this->section('card'); ?>
<form id="RoleCreateUpdate" method="<?=(isset($role_id) && !empty($role_id))?'PATCH':'PUT'?>">
    <input type="hidden" name="role_id" value="<?=@$role_id?>">
    <input type="hidden" name="access_type" value="MobileAppUser">
    <div class="mb-3">
        <label for="name" class="form-label">Role Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Role Name" value="<?=@$name?>">
        <span class="error-message" id="name-error"></span>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3"><?=@$description?></textarea>
        <span class="error-message" id="description-error"></span>
    </div>
    <button type="submit" class="btn btn-primary float-right m-2 p-2"><?=(isset($role_id) && !empty($role_id))?'Update':'Create'?></button>
</form>
<?php $this->endSection(); ?>
<?= view("Views/components/card/card")?>
<script id="mainPageScript">
    var formId = "RoleCreateUpdate";
    var method = "<?=(isset($role_id) && !empty($role_id))?'PATCH':'PUT'?>";
    var CreateUpdateApiUrl = "<?=base_url(route_to((isset($role_id) && !empty($role_id))?'roleupdate-api':'rolecreate-api'))?>";
    var ListPageUrl = "<?=base_url(route_to('rolelist'))?>";
</script>