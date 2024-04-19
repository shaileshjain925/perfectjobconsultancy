<?php $this->section('card'); ?>
<?= $this->include('Views/PerfectJobConsultancy/partials/ReportBody') ?>
<script id="mainPageScript">
    var GetListApiUrl = "<?=base_url(route_to('companyuserlist-api'))?>";
    var DeleteApiUrl = "<?=base_url(route_to('companyuserdelete-api'))?>";
</script>

<script type="text/javascript">
    var apiUrl = GetListApiUrl;
    var apiMethod = 'POST';
    var apiParameter = {
        // limit:{
        //     count:3
        // }
    };
    var downlaodFileName = '<?= $head_data['title'] ?>';
    var tableColumns = [];
    tableColumns["columnList"] = [{
            title: "company_user_id",
            field: "company_user_id",
            minWidth: 300,
            visible: false,
            sorter: "string",
        },
        {
            title: "Company Name",
            field: "firm_name",
            minWidth: 300,
            visible: true,
            sorter: "string",
        },
        {
            title: "User Name",
            field: "name",
            minWidth: 300,
            visible: true,
            sorter: "string",
        },{
            title: "Email",
            field: "email",
            minWidth: 300,
            visible: true,
            sorter: "string",
        },{
            title: "Password",
            field: "company_user_password",
            minWidth: 300,
            visible: false,
            sorter: "string",
        },{
            title: "Mobile",
            field: "mobile",
            minWidth: 300,
            visible: true,
            sorter: "string",
        },
        {
            title: "Role",
            field: "role_name",
            minWidth: 300,
            visible: true,
            sorter: "string",
        },
        {
            title: "Action",
            field: "company_user_id",
            minWidth: 300,
            visible: true,
            sorter: "string",
            formatter: function(cell, formatterParams, onRendered) {
                // Get the row data
                var rowData = cell.getRow().getData();

                // Create the edit button
                var editButton = "<a href='<?=base_url('BSS/Auth/WebsiteManagement/Company/User/Update')?>/"+ rowData.company_user_id +"'><i class='fas fa-edit text-success'></i> Edit</a>";

                // Create the delete button
                var deleteButton = "<a onclick='deleteRow(" + JSON.stringify({company_user_id: rowData.company_user_id}) + ")'><i class='fas fa-trash-alt text-danger'></i> Delete</a>";

                // Return the buttons
                return editButton + " | " + deleteButton;
            }
        }

    ];
    tableColumns["sort"] = [{
        column: "name",
        dir: "asc",
    }, ];
</script>
<?= $this->include('Views/PerfectJobConsultancy/partials/ReportScript') ?>
<?php $this->endSection(); ?>
<?= view("Views/components/card/card")?>