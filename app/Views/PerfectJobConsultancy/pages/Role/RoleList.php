<?php $this->section('card'); ?>
<?= $this->include('Views/PerfectJobConsultancy/partials/ReportBody') ?>
<script id="mainPageScript">
    var GetListApiUrl = "<?=base_url(route_to('rolelist-api'))?>";
    var DeleteApiUrl = "<?=base_url(route_to('roledelete-api'))?>";
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
            title: "role_id",
            field: "role_id",
            minWidth: 300,
            visible: false,
            sorter: "string",
        },
        {
            title: "Role Name",
            field: "name",
            // minWidth: 300,
            visible: true,
            sorter: "string",
        },{
            title: "Description",
            field: "description",
            minWidth: 300,
            visible: true,
            sorter: "string",
        },
        {
            title: "<span title='Role Base Menu Access'>RBMA</span>",
            field: "role_id",
            // minWidth: 100,
            visible: true,
            sorter: "string",
            formatter: function(cell, formatterParams, onRendered) {
                // Get the row data
                var rowData = cell.getRow().getData();

                return "<a href='<?=base_url('BSS/Auth/WebsiteManagement/Role/MenuRights')?>/"+ rowData.role_id +"'><i class='fas fa-user-cog text-success'></i></a>";
            }
        },
        {
            title: "Action",
            field: "role_id",
            // minWidth: 200,
            visible: true,
            sorter: "string",
            formatter: function(cell, formatterParams, onRendered) {
                // Get the row data
                var rowData = cell.getRow().getData();

                // Create the edit button
                var editButton = "<a href='<?=base_url('BSS/Auth/WebsiteManagement/Role/Update')?>/"+ rowData.role_id +"'><i class='fas fa-edit text-success'></i> Edit</a>";

                // Create the delete button
                var deleteButton = "<a href='#' onclick='deleteRow(" + JSON.stringify({role_id: rowData.role_id}) + ")'><i class='fas fa-trash-alt text-danger'></i> Delete</a>";

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