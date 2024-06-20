<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">

                <a href="javascript: void(0);" class="text-body fw-medium font-size-16">Patrick Becker</a>
                <p class="text-muted mt-1 mb-0 font-size-13">UI/UX Designer</p>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title"><?= lang('Files.Menu') ?></li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-airplay"></i><span class="badge rounded-pill bg-info float-end">2</span>
                        <span><?= lang('Files.Dashboard') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/"><?= lang('Files.Dashboard') ?> 11</a></li>
                        <li><a href="index-2"><?= lang('Files.Dashboard') ?> 2</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-flip-horizontal"></i>
                        <span><?= lang('Files.Layouts') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);" class="has-arrow"><?= lang('Files.Vertical') ?></a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-compact-sidebar"><?= lang('Files.Compact_Sidebar') ?></a></li>
                                <li><a href="layouts-icon-sidebar"><?= lang('Files.Icon_Sidebar') ?></a></li>
                                <li><a href="layouts-boxed"><?= lang('Files.Boxed_Layout') ?></a></li>
                                <li><a href="layouts-preloader"><?= lang('Files.Preloader') ?></a></li>
                            </ul>
                        </li>

                        <li><a href="javascript: void(0);" class="has-arrow"><?= lang('Files.Horizontal') ?></a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-horizontal"><?= lang('Files.Horizontal') ?></a></li>
                                <li><a href="layouts-hori-topbarlight"><?= lang('Files.Topbar_Light') ?></a></li>
                                <li><a href="layouts-hori-boxed"><?= lang('Files.Boxed_Layout') ?></a></li>
                                <li><a href="layouts-hori-preloader"><?= lang('Files.Preloader') ?></a></li>
                            </ul>
                        </li>
                    </ul>

                </li>

                <li>
                    <a href="vendor-list" class=" waves-effect">
                        <i class="mdi mdi-calendar-text"></i>
                        <span>Vendors</span>
                    </a>
                </li>
                <li>
                    <a href="media-type" class=" waves-effect">
                        <i class="mdi mdi-calendar-text"></i>
                        <span>Media Type</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-inbox-full"></i>
                        <span><?= lang('Files.Email') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="email-inbox"><?= lang('Files.Inbox') ?></a></li>
                        <li><a href="email-read"><?= lang('Files.Read_Email') ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-calendar-check"></i>
                        <span><?= lang('Files.Tasks') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tasks-list"><?= lang('Files.Task_List') ?></a></li>
                        <li><a href="tasks-kanban"><?= lang('Files.Kanban_Board') ?></a></li>
                        <li><a href="tasks-create"><?= lang('Files.Create_Task') ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span><?= lang('Files.Pages') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-login"><?= lang('Files.Login') ?></a></li>
                        <li><a href="pages-register"><?= lang('Files.Register') ?></a></li>
                        <li><a href="pages-recoverpw"><?= lang('Files.Recover_Password') ?></a></li>
                        <li><a href="pages-lock-screen"><?= lang('Files.Lock_Screen') ?></a></li>
                        <li><a href="pages-starter"><?= lang('Files.Starter_Page') ?></a></li>
                        <li><a href="pages-invoice"><?= lang('Files.Invoice') ?></a></li>
                        <li><a href="pages-profile"><?= lang('Files.Profile') ?></a></li>
                        <li><a href="pages-maintenance"><?= lang('Files.Maintenance') ?></a></li>
                        <li><a href="pages-comingsoon"><?= lang('Files.Coming_Soon') ?></a></li>
                        <li><a href="pages-timeline"><?= lang('Files.Timeline') ?></a></li>
                        <li><a href="pages-faqs"><?= lang('Files.FAQs') ?></a></li>
                        <li><a href="pages-pricing"><?= lang('Files.Pricing') ?></a></li>
                        <li><a href="pages-404"><?= lang('Files.Error_404') ?></a></li>
                        <li><a href="pages-500"><?= lang('Files.Error_500') ?></a></li>
                    </ul>
                </li>

                <li class="menu-title"><?= lang('Files.Components') ?></li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-checkbox-multiple-blank-outline"></i>
                        <span><?= lang('Files.UI_Elements') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts"><?= lang('Files.Alerts') ?></a></li>
                        <li><a href="ui-buttons"><?= lang('Files.Buttons') ?></a></li>
                        <li><a href="ui-cards"><?= lang('Files.Cards') ?></a></li>
                        <li><a href="ui-carousel"><?= lang('Files.Carousel') ?></a></li>
                        <li><a href="ui-dropdowns"><?= lang('Files.Dropdowns') ?></a></li>
                        <li><a href="ui-grid"><?= lang('Files.Grid') ?></a></li>
                        <li><a href="ui-images"><?= lang('Files.Images') ?></a></li>
                        <li><a href="ui-lightbox"><?= lang('Files.Lightbox') ?></a></li>
                        <li><a href="ui-modals"><?= lang('Files.Modals') ?></a></li>
                        <li><a href="ui-rangeslider"><?= lang('Files.Range_Slider') ?></a></li>
                        <li><a href="ui-session-timeout"><?= lang('Files.Session_Timeout') ?></a></li>
                        <li><a href="ui-progressbars"><?= lang('Files.Progress_Bars') ?></a></li>
                        <li><a href="ui-sweet-alert"><?= lang('Files.Sweet_Alert') ?></a></li>
                        <li><a href="ui-tabs-accordions"><?= lang('Files.Tabs_and_Accordions') ?></a></li>
                        <li><a href="ui-typography"><?= lang('Files.Typography') ?></a></li>
                        <li><a href="ui-video"><?= lang('Files.Video') ?></a></li>
                        <li><a href="ui-general"><?= lang('Files.General') ?></a></li>
                        <li><a href="ui-colors"><?= lang('Files.Colors') ?></a></li>
                        <li><a href="ui-rating"><?= lang('Files.Rating') ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-newspaper"></i>
                        <span class="badge rounded-pill bg-danger float-end">6</span>
                        <span><?= lang('Files.Forms') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="form-elements"><?= lang('Files.Form_Elements') ?></a></li>
                        <li><a href="form-validation"><?= lang('Files.Form_Validation') ?></a></li>
                        <li><a href="form-advanced"><?= lang('Files.Form_Advanced') ?></a></li>
                        <li><a href="form-editors"><?= lang('Files.Form_Editors') ?></a></li>
                        <li><a href="form-uploads"><?= lang('Files.Form_File_Upload') ?></a></li>
                        <li><a href="form-xeditable"><?= lang('Files.Form_Xeditable') ?></a></li>
                        <li><a href="form-repeater"><?= lang('Files.Form_Repeater') ?></a></li>
                        <li><a href="form-wizard"><?= lang('Files.Form_Wizard') ?></a></li>
                        <li><a href="form-mask"><?= lang('Files.Form_Mask') ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-clipboard-list-outline"></i>
                        <span><?= lang('Files.Tables') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tables-basic"><?= lang('Files.Basic_Tables') ?></a></li>
                        <li><a href="tables-datatable"><?= lang('Files.Data_Tables') ?></a></li>
                        <li><a href="tables-responsive"><?= lang('Files.Responsive_Table') ?></a></li>
                        <li><a href="tables-editable"><?= lang('Files.Editable_Table') ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-chart-donut"></i>
                        <span><?= lang('Files.Charts') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="charts-apex"><?= lang('Files.Apex_charts') ?></a></li>
                        <li><a href="charts-chartjs"><?= lang('Files.Chartjs_Chart') ?></a></li>
                        <li><a href="charts-flot"><?= lang('Files.Flot_Chart') ?></a></li>
                        <li><a href="charts-knob"><?= lang('Files.Jquery_Knob_Chart') ?></a></li>
                        <li><a href="charts-sparkline"><?= lang('Files.Sparkline_Chart') ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-emoticon-happy-outline"></i>
                        <span><?= lang('Files.Icons') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="icons-boxicons"><?= lang('Files.Boxicons') ?></a></li>
                        <li><a href="icons-materialdesign"><?= lang('Files.Material_Design') ?></a></li>
                        <li><a href="icons-dripicons"><?= lang('Files.Dripicons') ?></a></li>
                        <li><a href="icons-fontawesome"><?= lang('Files.Font_awesome') ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-map-marker-outline"></i>
                        <span><?= lang('Files.Maps') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maps-google"><?= lang('Files.Google_Maps') ?></a></li>
                        <li><a href="maps-vector"><?= lang('Files.Vector_Maps') ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-file-tree"></i>
                        <span><?= lang('Files.Multi_Level') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);"><?= lang('Files.Level_1_1') ?></a></li>
                        <li><a href="javascript: void(0);" class="has-arrow"><?= lang('Files.Level_1_2') ?></a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);"><?= lang('Files.Level_2_1') ?></a></li>
                                <li><a href="javascript: void(0);"><?= lang('Files.Level_2_2') ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->