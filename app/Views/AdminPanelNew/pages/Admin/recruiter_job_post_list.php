<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>
            <?= (isset($company_name)) ? $company_name : 'All' ?> Job Post
        </h4>
        <a class="btn btn-primary" href="<?= (isset($recruiter_profile_id)) ? base_url(route_to('recuriter_job_post_create_update', $recruiter_profile_id)) : base_url(route_to('job_post_create_update')) ?>">
            <i class='bx bx-briefcase'></i> Add Jobs
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="table-responsive">
                <table id="listTable" class="display table table-striped table-bordered mb-0"></table>
            </div>
        </div>
    </div>
</div>

<!-- Add User form offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="RightSlideBox" aria-labelledby="RightSlideBox" style="width: 700px!important; overflow-x:auto">

</div>
<script>
    var DeleteApiUrl = "<?= base_url(route_to('job_post_delete_api')) ?>"

    function successCallback(response) {
        if (response.status == 200 || response.status == 201) {
            $(".offcanvas button[data-bs-dismiss='offcanvas']").click();
            fetchTableData({});
        }
    }

    function errorCallback(response) {
        console.log(response);
    }

    function deleteUser(job_post_id) {
        deleteRow({
                "job_post_id": job_post_id
            }).then((response) => {
                fetchTableData();
            })
            .catch((error) => {
                console.error("Deletion failed or cancelled:", error);
            });
    }

    function editJobs(job_post_id = null) {
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to("JobPostCreateUpdateComponent")) ?>",
            data: {
                job_posttype: 'recruiter',
                job_post_id: job_post_id
            },
            success: function(response) {
                $("#RightSlideBox").html("");
                $("#RightSlideBox").html(response);

            }
        });
    }

    function viewProfile(job_post_id = null) {
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to("JobPostView")) ?>",
            data: {
                job_post_id: job_post_id,
            },
            success: function(response) {
                $("#RightSlideBox").html("");
                $("#RightSlideBox").html(response);

            }
        });
    }

    function successDataTableCallbackFunction(response) {
        var columns = [{
                title: "Company",
                data: "company_name"
            },
            {
                title: "Title",
                data: "job_title"
            },
            {
                title: "Type",
                data: "job_type_name"
            },
            {
                title: "Position",
                data: "job_position_name"
            },
            {
                title: "Description",
                data: "job_description"
            },
            {
                title: "Status",
                data: "job_post_status"
            },
            {
                title: "Approvel",
                data: "job_post_approvel"
            },
            {
                "title": "Actions",
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <button class="btn btn-sm btn-info" onclick="viewProfile(${row.job_post_id})" data-bs-toggle="offcanvas" data-bs-target="#RightSlideBox" aria-controls="RightSlideBox">
                                <i class='bx bx-info-circle'></i>
                            </button>
                            <a class="btn btn-sm btn-primary" href="<?= base_url(route_to('recuriter_job_post_create_update', '')) ?>/${row.job_post_id}">
                                <i class="bx bx-edit-alt"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" onclick="deleteUser(${row.job_post_id})">
                                <i class="bx bx-trash-alt"></i>
                            </button>
                        `;
                }
            }
        ];

        if (response.status == 200) {
            return {
                "status": response.status,
                "columns": columns,
                "data": JSON.parse(response.data)
            };
        } else {
            return {
                "status": response.status,
                "columns": columns,
                "data": {}
            };
        }
    }

    function fetchTableData(parameter = {}) {
        parameter._autojoin = "Y";
        parameter._select = "*";
        parameter.recruiter_profile_id = '<?= @$recruiter_profile_id ?>';
        DataTableInitialized(
            'listTable', // table_id
            "<?= base_url(route_to('job_post_list_api')) ?>", // url
            'POST', // method
            parameter, // parameter
            successDataTableCallbackFunction // dataTableSuccessCallBack
        );
    }
    $(document).ready(function() {
        fetchTableData();
    });
</script>