<?= $this->extend(config(\Config\Auth::class)->views['layout']) ?>

<?= $this->section('title') ?><?= lang('Auth.register') ?> <?= $this->endSection() ?>

<?= $this->section('main') ?>

<div class="container d-flex justify-content-center p-5">
    <div class="card col-12 col-md-5 shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-5"><?= lang('Auth.register') ?></h5>

            <?php if (session('error') !== null) : ?>
                <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
            <?php elseif (session('errors') !== null) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php if (is_array(session('errors'))) : ?>
                        <?php foreach (session('errors') as $error) : ?>
                            <?= $error ?>
                            <br>
                        <?php endforeach ?>
                    <?php else : ?>
                        <?= session('errors') ?>
                    <?php endif ?>
                </div>
            <?php endif ?>

            <form action="<?= base_url(route_to('registerPost')) ?>" method="post">
                <?= csrf_field() ?>
                <!-- First Name -->
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="floatingFirstnameInput" name="first_name" inputmode="text" autocomplete="first_name" placeholder="First Name" value="<?= old('first_name') ?>" required>
                    <label for="floatingEmailInput">First Name</label>
                </div>
                <!-- Last Name -->
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="floatingLastnameInput" name="last_name" inputmode="text" autocomplete="last_name" placeholder="Last Name" value="<?= old('last_name') ?>">
                    <label for="floatingEmailInput">Last name</label>
                </div>
                <!-- Mobile -->
                <div class="form-floating mb-2">
                    <input type="tel" class="form-control" id="floatingMobilenumberInput" name="mobile_number" inputmode="tel" autocomplete="mobile_number" placeholder="Mobile Number" value="<?= old('mobile_number') ?>" minlength="10" maxlength="12">
                    <label for="floatingMobilenumberInput">Mobile Number</label>
                </div>

                <!-- Email -->
                <div class="form-floating mb-2">
                    <input type="email" class="form-control" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required>
                    <label for="floatingEmailInput"><?= lang('Auth.email') ?></label>
                </div>

                <!-- Username -->
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="floatingUsernameInput" name="username" inputmode="text" autocomplete="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" required>
                    <label for="floatingUsernameInput"><?= lang('Auth.username') ?></label>
                </div>

                <!-- Password -->
                <div class="form-floating mb-2">
                    <input type="password" class="form-control" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.password') ?>" required>
                    <label for="floatingPasswordInput"><?= lang('Auth.password') ?></label>
                </div>

                <!-- Password (Again) -->
                <div class="form-floating mb-5">
                    <input type="password" class="form-control" id="floatingPasswordConfirmInput" name="password_confirm" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.passwordConfirm') ?>" required>
                    <label for="floatingPasswordConfirmInput"><?= lang('Auth.passwordConfirm') ?></label>
                </div>

                <div class="d-grid col-12 col-md-8 mx-auto m-3">
                    <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
                </div>

                <p class="text-center"><?= lang('Auth.haveAccount') ?> <a href="<?= base_url(route_to('login')) ?>"><?= lang('Auth.login') ?></a></p>

            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>