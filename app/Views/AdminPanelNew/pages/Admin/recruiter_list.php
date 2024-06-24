<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>
            Recruiter
        </h4>

        <button class="btn btn-primary" onclick="editUser()" type="button" data-bs-toggle="offcanvas" data-bs-target="#RightSlideBox" aria-controls="RightSlideBox">
            <i class="bx bxs-user-plus"></i> Add Recruiter
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="table-responsive">
                <table id="usersTable" class="display table table-striped table-bordered mb-0"></table>
            </div>
        </div>
    </div>
</div>

<!-- Add User form offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="RightSlideBox" aria-labelledby="RightSlideBox">

</div>
<script>
    var DeleteApiUrl = "<?= base_url(route_to('user_delete_api')) ?>"

    function successCallback(response) {
        if (response.status == 200 || response.status == 201) {
            $(".offcanvas button[data-bs-dismiss='offcanvas']").click();
            fetchTableData({
                user_type: 'recruiter'
            });
        }
    }

    function errorCallback(response) {
        console.log(response);
    }

    function deleteUser(user_id) {
        deleteRow({
                "user_id": user_id
            }).then((response) => {
                fetchTableData({
                    user_type: 'recruiter'
                });
            })
            .catch((error) => {
                console.error("Deletion failed or cancelled:", error);
            });
    }

    function editUser(user_id = null) {
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to("UserCreateUpdateComponent")) ?>",
            data: {
                user_type: 'recruiter',
                user_id: user_id
            },
            success: function(response) {
                $("#RightSlideBox").html("");
                $("#RightSlideBox").html(response);

            }
        });
    }

    function editProfile(recruiter_profile_id = null) {
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to("RecuriterProfileCreateUpdateComponent")) ?>",
            data: {
                recruiter_profile_id: recruiter_profile_id,
            },
            success: function(response) {
                $("#RightSlideBox").html("");
                $("#RightSlideBox").html(response);

            }
        });
    }

    function successDataTableCallbackFunction(response) {
        var columns = [{
                title: "Recruiter ID",
                data: "user_id"
            },
            {
                title: "Recruiter Name",
                data: "fullname"
            },
            {
                title: "Email",
                data: "email"
            },
            {
                title: "Mobile",
                data: "mobile"
            },
            {
                title: "Company",
                data: "company_name"
            },
            {
                title: "State",
                data: "state_name"
            },
            {
                title: "City",
                data: "city_name"
            },
            {
                "title": "Actions",
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <button class="btn btn-sm btn-danger" onclick="deleteUser(${row.user_id})">
                                <i class="bx bx-profile-alt"></i>
                            </button>
                            <button class="btn btn-sm btn-info" onclick="editUser(${row.user_id})" data-bs-toggle="offcanvas" data-bs-target="#RightSlideBox" aria-controls="RightSlideBox">
                                <i class="bx bx-edit-alt"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="deleteUser(${row.user_id})">
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
        DataTableInitialized(
            'usersTable', // table_id
            "<?= base_url(route_to('RecruiterListWithProfileDetails')) ?>", // url
            'POST', // method
            parameter, // parameter
            successDataTableCallbackFunction // dataTableSuccessCallBack
        );
    }
    $(document).ready(function() {
        fetchTableData({
            user_type: 'recruiter'
        });
    });
</script>