<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h5 class="header-title pb-3"><?= @$form_header_title ?></h5>
                <div class="general-label">
                    <form role="form" class="<?= @$form_classes ?>" name="<?= @$form_name ?>" id="<?= @$form_id ?>" method="<?= @$form_method ?>" enctype="<?= @$form_enctype ?>" autocomplete="<?= @$form_autocomplete ?>" target="<?= @$form_target ?>" <?= @$form_attributes ?>>
                        <?= @$form_body_content ?>
                        <div class="btn-group mt-3 float-right mr-2" role="group" aria-label="Basic example">
                        <?= view("Views/components/button/cancle") ?>
                        <?= view("Views/components/button/reset") ?>
                        <?= view("Views/components/button/submit") ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>