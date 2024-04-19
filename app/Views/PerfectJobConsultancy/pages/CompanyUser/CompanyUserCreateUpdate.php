<?php $this->section('card'); ?>
<form id="CompanyUserCreateUpdate" method="<?=(isset($company_user_id) && !empty($company_user_id)) ? 'PATCH' : 'PUT'?>">
    <input type="hidden" name="company_user_id" value="<?=@$company_user_id?>">
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="name" class="form-label">User Name</label>
            <input class="form-control" id="name" name="name" placeholder="User Name" type="text" value="<?=@$name?>">
            <span class="error-message" id="name-error"></span>
        </div>
        <div class="col-md-4 mb-3">
            <label for="company_id" class="form-label">Company</label>
            <select name="company_id" id="company_id" class="selectComponent"></select>
            <span class="error-message" id="company_id-error"></span>
        </div>
        <div class="col-md-4 mb-3">
            <label for="role_id" class="form-label">Role</label>
            <select name="role_id" id="role_id" class="selectComponent"></select>
            <span class="error-message" id="role_id-error"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="email" class="form-label">Email</label>
            <input class="form-control" id="email" name="email" placeholder="Email" type="email" value="<?=@$email?>">
            <span class="error-message" id="email-error"></span>
        </div>
        <div class="col-md-4 mb-3">
            <label for="mobile" class="form-label">Mobile</label>
            <input class="form-control" id="mobile" name="mobile" placeholder="Mobile" type="number" value="<?=@$mobile?>">
            <span class="error-message" id="mobile-error"></span>
        </div>
        <div class="col-md-4 mb-3">
            <label for="company_user_password" class="form-label">Password</label>
            <input class="form-control" id="company_user_password" name="company_user_password" placeholder="Password" type="password" value="<?=@$company_user_password?>">
            <span class="error-message" id="company_user_password-error"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="selectComponent">
                <option value="admin">Admin User</option>
                <option value="staff">Staff User</option>
            </select>
            <span class="error-message" id="type-error"></span>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" <?= (isset($is_active) && $is_active == 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="is_active">
                  Active
                </label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary float-right m-2 p-2"><?=(isset($company_user_id) && !empty($company_user_id)) ? 'Update' : 'Create'?></button>
</form>
<?php $this->endSection(); ?>
<?= view('Views/components/card/card') ?>
<script id="mainPageScript">
    var formId = 'CompanyUserCreateUpdate';
    var method = "<?=(isset($company_user_id) && !empty($company_user_id)) ? 'PATCH' : 'PUT'?>";
    var CreateUpdateApiUrl = "<?=base_url(route_to((isset($company_user_id) && !empty($company_user_id)) ? 'companyuserupdate-api' : 'companyusercreate-api'))?>";
    var CompanyListApiUrl = "<?=base_url(route_to('companylist-api'))?>";
    var selected_company_id = <?= isset($company_id) ? json_encode($company_id) : 'null' ?>;
    var RoleListApiUrl = "<?=base_url(route_to('rolelist-api'))?>";
    var selected_role_id = <?= isset($role_id) ? json_encode($role_id) : 'null' ?>;
    var ListPageUrl = "<?=base_url(route_to('companyuserlist'))?>";
</script>
