<?php
@$assets_url = base_url('PerfectJobConsultancy/Syntra/assets');
?>
<!-- sidebar left start-->
<div class="sidebar-left">
    <div class="sidebar-left-info">
        <ul class="side-navigation">
            <li>
                <h3 class="navigation-title">Navigation</h3>
            </li>
            <li class="active">
                <a href="<?= base_url(route_to('dashboard')) ?>"><i class="mdi mdi-gauge"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-list"><a href=""><i class="mdi mdi-web"></i> <span>Website Management</span></a>
                <ul class="child-list">
                    <li><a href="<?= base_url(route_to('CompanySetupCreateUpdate')) ?>">Companies Setup</a></li>
                    <li><a href="<?= base_url(route_to('FormSubmissionList')) ?>">Enquiries</a></li>
                    <li><a href="<?= base_url(route_to('BlogPostList')) ?>">Blog Post</a></li>
                    <li><a href="<?= base_url(route_to('CompanySetupCreateUpdate')) ?>">Media Gallery</a></li>
                    <li><a href="<?= base_url(route_to('CompanySetupCreateUpdate')) ?>">Product & Services</a></li>
                    <li><a href="<?= base_url() ?>">Registered Companyies</a></li>
                    <li><a href="<?= base_url(route_to('CompanySetupCreateUpdate')) ?>">Suscribers</a></li>
                </ul>
            </li>
            <li class="menu-list"><a href=""><i class="mdi mdi-briefcase"></i> <span>Job Management</span></a>
                <ul class="child-list">
                    <!-- <li><a href="<?= base_url() ?>">City</a></li> -->
                    <li><a href="<?= base_url() ?>">Job Group</a></li>
                    <li><a href="<?= base_url() ?>">Job Category</a></li>
                    <li><a href="<?= base_url() ?>">Job List</a></li>
                </ul>
            </li>
            <li class="menu-list"><a href=""><i class="mdi mdi-briefcase-upload"></i> <span>Recruiters</span></a>
                <ul class="child-list">
                    <!-- <li><a href="<?= base_url() ?>">City</a></li> -->
                    <li><a href="<?= base_url() ?>">Recruiters List</a></li>
                    <li><a href="<?= base_url() ?>">Job Post</a></li>
                    <li><a href="<?= base_url() ?>">Job Apply</a></li>
                </ul>
            </li>
            <li class="menu-list"><a href=""><i class="mdi mdi-account-search"></i> <span>Job Seeker</span></a>
                <ul class="child-list">
                    <!-- <li><a href="<?= base_url() ?>">City</a></li> -->
                    <li><a href="<?= base_url() ?>">Job Seeker List</a></li>
                    <li><a href="<?= base_url() ?>">Job Apply</a></li>
                </ul>
            </li>

            <!-- <li class="menu-list"><a href=""><i class="mdi mdi-buffer"></i> <span>UI Elements</span></a>
                <ul class="child-list">
                    <li><a href="ui-typography.html"> Typography</a></li>
                    <li><a href="ui-buttons.html"> Buttons</a></li>
                    <li><a href="ui-cards.html"> Cards</a></li>
                    <li><a href="ui-tabs.html"> Tab & Accordions</a></li>
                    <li><a href="ui-modals.html"> Modals</a></li>
                    <li><a href="ui-bootstrap.html"> BS Elements</a></li>
                    <li><a href="ui-progressbars.html"> Progress Bars</a></li>
                    <li><a href="ui-notification.html">Notification</a></li>
                    <li><a href="ui-carousel.html"> Carousel</a></li>
                </ul>
            </li> -->
            <!-- <li>
                <h3 class="navigation-title">Components</h3>
            </li>
            <li class="menu-list"><a href=""><i class="mdi mdi-google-circles-extended"></i> <span>Components <span class="badge badge-primary noti-arrow pull-right">6</span> </span></a>
                <ul class="child-list">
                    <li><a href="components-grid.html"> Grid</a></li>
                    <li><a href="components-calendar.html"> Calendar</a></li>
                    <li><a href="components-sweet-alerts.html"> Sweet Alerts </a></li>
                    <li><a href="components-portlets.html"> Portlets </a></li>
                    <li><a href="components-widgets.html"> Widgets </a></li>
                    <li><a href="components-nestable.html"> Nestable </a></li>
                    <li><a href="components-range-slider.html"> Range Slider </a></li>
                </ul>
            </li>
            <li class="menu-list"><a href=""><i class="mdi mdi-diamond"></i> <span>Icons</span></a>
                <ul class="child-list">
                    <li><a href="icons-material.html"> Material Design</a></li>
                    <li><a href="icons-font-awesome.html"> Font Awesome</a></li>
                    <li><a href="icons-themify.html"> Themify</a></li>
                </ul>
            </li>
            <li class="menu-list"><a href="javascript:;"><i class="mdi mdi-table"></i> <span>Tables</span></a>
                <ul class="child-list">
                    <li><a href="tables-basic.html"> Basic Table</a></li>
                    <li><a href="tables-datatable.html"> Data Table</a></li>
                    <li><a href="tables-editable.html"> Editable </a></li>
                    <li><a href="tables-responsive.html"> Responsive Table </a></li>
                </ul>
            </li>
            <li class="menu-list"><a href=""><i class="mdi mdi-google-earth"></i> <span>Forms</span></a>
                <ul class="child-list">
                    <li><a href="form-elements.html">General Elements</a></li>
                    <li><a href="form-validation.html">Form Validation</a></li>
                    <li><a href="form-advanced.html">Advanced Form</a></li>
                    <li><a href="form-wizard.html">Form Wizard</a></li>
                    <li><a href="form-editor.html">WYSIWYG Editor</a></li>
                    <li><a href="form-uploads.html">Multiple File Upload</a></li>
                    <li><a href="form-imagecrop.html">Image Crop</a></li>
                    <li><a href="form-xeditable.html">X-Editable</a></li>
                    <li><a href="form-summernote.html">Summernote</a></li>
                </ul>
            </li>
            <li class="menu-list"><a href=""><i class="mdi mdi-chart-arc"></i> <span>Charts </span></a>
                <ul class="child-list">
                    <li><a href="chart-morris.html">Morris Chart</a></li>
                    <li><a href="chart-chartjs.html">Chartjs</a></li>
                    <li><a href="chart-flot.html">Flot Chart</a></li>
                    <li><a href="chart-peity.html">Peity Chart</a></li>
                    <li><a href="chart-knob.html">Knob Chart</a></li>
                </ul>
            </li>
            <li class="menu-list"><a href=""><i class="mdi mdi-email" aria-hidden="true"></i><span>Mail </span></a>
                <ul class="child-list">
                    <li><a href="email-inbox.html">Inbox</a></li>
                    <li><a href="email-compose.html">Compose mail</a></li>
                    <li><a href="email-read.html">View Mail</a></li>
                </ul>
            </li>
            <li class="menu-list"><a href=""><i class="mdi mdi-newspaper" aria-hidden="true"></i><span>Email Templates</span></a>
                <ul class="child-list">
                    <li><a href="email-template-alert.html">Alert</a></li>
                    <li><a href="email-template-action.html">Action</a></li>
                    <li><a href="email-template-billing.html">Billing</a></li>
                </ul>
            </li>
            <li class="menu-list"><a href=""><i class="mdi mdi-map" aria-hidden="true"></i><span>Maps</span></a>
                <ul class="child-list">
                    <li><a href="maps-gmap.html">Google Map</a></li>
                    <li><a href="maps-vector.html">Vector Map</a></li>
                </ul>
            </li>
            <li class="menu-list"><a href=""><i class="mdi mdi-book-multiple" aria-hidden="true"></i><span>Pages</span></a>
                <ul class="child-list">
                    <li><a href="pages-profile.html">Profile</a></li>
                    <li><a href="pages-timeline.html">Timeline</a></li>
                    <li><a href="pages-invoice.html">Invoice</a></li>
                    <li><a href="pages-contact.html">Contact-list</a></li>
                    <li><a href="pages-login.html">Login</a></li>
                    <li><a href="pages-register.html">Register</a></li>
                    <li><a href="pages-recoverpw.html">Recover Password</a></li>
                    <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                    <li><a href="pages-blank.html">Blank Page</a></li>
                    <li><a href="pages-404.html">404 Error</a></li>
                    <li><a href="pages-500.html">500 Error</a></li>
                </ul>
            </li> -->
        </ul><!--sidebar nav end-->
    </div>
</div><!-- sidebar left end-->