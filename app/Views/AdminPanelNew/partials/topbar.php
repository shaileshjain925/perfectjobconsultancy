<header id="page-topbar">
    <div class="navbar-header">
        <div class="container-fluid">
            <div class="float-end">

                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                        id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="<?= lang('Files.Search') ?>"
                                        aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i
                                                class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="dropdown d-none d-sm-inline-block">
                    <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <?php
                            $session = \Config\Services::session();
                            $lang = $session->get('lang');
                            switch($lang){
                                case 'en':
                                echo '<img src="'.base_url($_assets_path).'/assets/images/flags/us.jpg" alt="Header Language" height="16">';
                                    break;
                                case 'es':
                                echo '<img src="'.base_url($_assets_path).'/assets/images/flags/spain.jpg" alt="Header Language" height="16">';
                                    break;
                                case 'de':
                                echo '<img src="'.base_url($_assets_path).'/assets/images/flags/germany.jpg" alt="Header Language" height="16">';
                                    break;
                                case 'it':
                                echo '<img src="'.base_url($_assets_path).'/assets/images/flags/italy.jpg" alt="Header Language" height="16">';
                                    break;
                                case 'ru':
                                echo '<img src="'.base_url($_assets_path).'/assets/images/flags/russia.jpg" alt="Header Language" height="16">';
                                    break;
                                default:
                                    echo '<img src="'.base_url($_assets_path).'/assets/images/flags/us.jpg" alt="Header Language" height="16">';
                            }
                        ?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">

                        <!-- item-->
                        <a href="<?= base_url('lang/en'); ?>" class="dropdown-item notify-item">
                            <img src="<?=base_url($_assets_path.'')?>assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span
                                class="align-middle">English</span>
                        </a>
                        <!-- item-->
                        <!-- <a href="<#?= base_url('lang/es'); ?>" class="dropdown-item notify-item">
                            <img src="<#?=base_url($_assets_path.'')?>assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span
                                class="align-middle">Spanish</span>
                        </a> -->

                        <!-- item-->
                        <!-- <a href="<#?= base_url('lang/de'); ?>" class="dropdown-item notify-item">
                            <img src="<#?=base_url($_assets_path.'')?>assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span
                                class="align-middle">German</span>
                        </a> -->

                        <!-- item-->
                        <!-- <a href="<#?= base_url('lang/it'); ?>" class="dropdown-item notify-item">
                            <img src="<#?=base_url($_assets_path.'')?>assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span
                                class="align-middle">Italian</span>
                        </a> -->

                        <!-- item-->
                        <!-- <a href="<#?= base_url('lang/ru'); ?>" class="dropdown-item notify-item">
                            <img src="<#?=base_url($_assets_path.'')?>assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span
                                class="align-middle">Russian</span>
                        </a> -->
                    </div>
                </div>

                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="mdi mdi-fullscreen"></i>
                    </button>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                        id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="badge rounded-pill bg-danger ">3</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0"> <?= lang('Files.Notifications') ?> </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small"> <?= lang('Files.View_All') ?></a>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex align-items-start">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title bg-primary rounded-circle font-size-16">
                                            <i class="bx bx-cart"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mt-0 mb-1"><?= lang('Files.Your_order_is_placed') ?></h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1"><?= lang('Files.If_several_languages_coalesce_the_grammar') ?></p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <?= lang('Files.min_ago') ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex align-items-start">
                                    <img src="<?=base_url($_assets_path.'assets/images/users/avatar-3.jpg')?>" class="me-3 rounded-circle avatar-xs"
                                        alt="user-pic">
                                    <div class="flex-1">
                                        <h6 class="mt-0 mb-1">James Lemire</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1"><?= lang('Files.It_will_seem_like_simplified_English') ?></p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <?= lang('Files.hours_ago') ?></p>
                                    </div>
                                    </div>
                                </div>
                            </a>
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex align-items-start">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title bg-success rounded-circle font-size-16">
                                            <i class="bx bx-badge-check"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mt-0 mb-1"><?= lang('Files.Your_item_is_shipped') ?></h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1"><?= lang('Files.If_several_languages_coalesce_the_grammar') ?></p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <?= lang('Files.min_ago') ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="" class="text-reset notification-item">
                                <div class="d-flex align-items-start">
                                    <img src="<?=base_url($_assets_path.'assets/images/users/avatar-4.jpg')?>" class="me-3 rounded-circle avatar-xs"
                                        alt="user-pic">
                                    <div class="flex-1">
                                        <h6 class="mt-0 mb-1">Salena Layfield</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1"><?= lang('Files.As_a_skeptical_Cambridge_friend_of_mine_occidental') ?></p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <?= lang('Files.hours_ago') ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="p-2 border-top d-grid">
                            <a class="btn btn-sm btn-link font-size-14 " href="javascript:void(0)">
                                <i class="mdi mdi-arrow-right-circle me-3"></i><?= lang('Files.View_More') ?></a>
                        </div>
                    </div>
                </div>
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="<?=base_url($_assets_path.$_user_image_url)?>"
                            alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1"><?=@$_user_name?></span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="/pages-profile"><i class="bx bx-user font-size-16 align-middle me-1"></i>
                        <?= lang('Files.Profile') ?></a>
                        <a class="dropdown-item" href="/pages-lock-screen"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i>
                        <?= lang('Files.Lock_screen') ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="/pages-login"><i
                                class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <?= lang('Files.Logout') ?></a>
                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="mdi mdi-settings-outline"></i>
                    </button>
                </div>

            </div>
            <div>
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="/" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?=base_url($_assets_path.'assets/images/logo-sm.png')?>" alt="logo" height="20">
                        </span>
                        <span class="logo-lg">
                            <img src="<?=base_url($_assets_path.'assets/images/logo-dark.png')?>" alt="logo" height="17">
                        </span>
                    </a>

                    <a href="/" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?=base_url($_assets_path.'assets/images/logo-sm.png')?>" alt="logo" height="20">
                        </span>
                        <span class="logo-lg">
                            <img src="<?=base_url($_assets_path.'assets/images/logo-light.png')?>" alt="logo" height="19">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect"
                    id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <!-- App Search-->
                <form class="app-search d-none d-lg-inline-block">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="<?= lang('Files.Search') ?>">
                        <span class="bx bx-search-alt"></span>
                    </div>
                </form>

                <div class="dropdown dropdown-mega d-none d-lg-inline-block ms-2">
                    <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                        aria-haspopup="false" aria-expanded="false">
                        <?= lang('Files.Mega_Menu') ?>
                        <i class="mdi mdi-chevron-down"></i>
                    </button>
                    <div class="dropdown-menu dropdown-megamenu">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5 class="font-size-14"><?= lang('Files.UI_Components') ?></h5>
                                        <ul class="list-unstyled megamenu-list text-muted">
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.Lightbox') ?></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.Range_Slider') ?></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.Sweet_Alert') ?></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.Rating') ?></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.Forms') ?></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.Tables') ?></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.Charts') ?></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-4">
                                        <h5 class="font-size-14"><?= lang('Files.Applications') ?></h5>
                                        <ul class="list-unstyled megamenu-list">
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.Ecommerce') ?></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.Calendar') ?></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.Email') ?></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.Projects') ?></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.Tasks') ?></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.Contacts') ?></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-4">
                                        <h5 class="font-size-14"><?= lang('Files.Extra_Pages') ?></h5>
                                        <ul class="list-unstyled megamenu-list">
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.Light_Sidebar') ?></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.Compact_Sidebar') ?></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.Horizontal_layout') ?></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.Maintenance') ?></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.Coming_Soon') ?></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.Timeline') ?></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><?= lang('Files.FAQs') ?></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h5 class="font-size-14"><?= lang('Files.Components') ?></h5>
                                        <div class="px-lg-2">
                                            <div class="row g-0">
                                                <div class="col">
                                                    <a class="dropdown-icon-item" href="javascript: void(0);">
                                                        <img src="<?=base_url($_assets_path.'assets/images/brands/github.png')?>" alt="Github">
                                                        <span>GitHub</span>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="dropdown-icon-item" href="javascript: void(0);">
                                                        <img src="<?=base_url($_assets_path.'assets/images/brands/bitbucket.png')?>" alt="bitbucket">
                                                        <span>Bitbucket</span>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="dropdown-icon-item" href="javascript: void(0);">
                                                        <img src="<?=base_url($_assets_path.'assets/images/brands/dribbble.png')?>" alt="dribbble">
                                                        <span>Dribbble</span>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="row g-0">
                                                <div class="col">
                                                    <a class="dropdown-icon-item" href="javascript: void(0);">
                                                        <img src="<?=base_url($_assets_path.'assets/images/brands/dropbox.png')?>" alt="dropbox">
                                                        <span>Dropbox</span>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="dropdown-icon-item" href="javascript: void(0);">
                                                        <img src="<?=base_url($_assets_path.'assets/images/brands/mail_chimp.png')?>" alt="mail_chimp">
                                                        <span>Mail Chimp</span>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="dropdown-icon-item" href="javascript: void(0);">
                                                        <img src="<?=base_url($_assets_path.'assets/images/brands/slack.png')?>" alt="slack">
                                                        <span>Slack</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div>
                                            <div class="card text-white mb-0 overflow-hidden text-white-50"
                                                style="background-image: url('<?=base_url($_assets_path.'assets/images/megamenu-img.png')?>');background-size: cover;">
                                                <div class="card-img-overlay"></div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <h4 class="text-white mb-3"><?= lang('Files.Sale') ?></h4>

                                                            <h5 class="text-white-50"><?= lang('Files.Up_to') ?> <span
                                                                    class="font-size-24 text-white">50 %</span> <?= lang('Files.Off') ?></h5>
                                                            <p><?= lang('Files.At_vero_eos_accusamus_et_iusto_odio') ?></p>
                                                            <div class="mb-4">
                                                                <a href="javascript: void(0);" class="btn btn-success btn-sm"><?= lang('Files.View_more') ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>