<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>
            Category Type
        </h4>

        <button class="btn btn-primary" onclick="editCategory()" type="button" data-bs-toggle="offcanvas" data-bs-target="#AddRole" aria-controls="AddRole">
            <i class="bx bxs-user-plus"></i> Add Category Type
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="table-responsive">
                <table id="categoryTable" class="display table table-striped table-bordered mb-0"></table>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="AddRole" aria-labelledby="AddRoleLabel">

</div>




<script>
    var DeleteApiUrl = "<?= base_url(route_to('categoryType_delete_api')) ?>"

    function successCallback(response) {
        if (response.status == 200 || response.status == 201) {
            $(".offcanvas button[data-bs-dismiss='offcanvas']").click();
            fetchTableData();
        }
    }

    function errorCallback(response) {
        console.log(response);
    }

    function deleteCategory(category_type_id) {
        deleteRow({
                "category_type_id": category_type_id
            }).then((response) => {
                fetchTableData();
            })
            .catch((error) => {
                console.error("Deletion failed or cancelled:", error);
            });
    }

    function editCategory(category_type_id = null) {
        $.ajax({
            type: "get",
            url: "<?= base_url(route_to("CategoryTypeCreateUpdate")) ?>" + (category_type_id ? "/" + category_type_id : ""),
            success: function(response) {
                $("#AddRole").html("");
                $("#AddRole").html(response);

            }
        });
    }

    function successDataTableCallbackFunction(response) {
        var columns = [{
                title: "Category Type ID",
                data: "category_type_id"
            },
            {
                title: "Category Name",
                data: "category_type_name"
            },
            {
                title: "Image",
                data: null,
                "render": function(data, type, row) {
                    return `
                    <img class="image-fluid" style="height:auto; width:100px" src="<?=base_url()?>/${row.category_type_image }">
                    `;
                }
            },
            {
                title: "Description",
                data: "category_type_description"
            },
            {
                title: "SEO Keywords",
                data: "category_type_seo_keyword"
            },
            {
                title: "SEO Description",
                data: "category_type_seo_description"
            },
            {
                title: "Active",
                data: "is_active"
            },
            {
                "title": "Actions",
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <button class="btn btn-sm btn-info" onclick="editCategory(${row.category_type_id })" data-bs-toggle="offcanvas" data-bs-target="#AddRole" aria-controls="AddRole">
                                <i class="bx bx-edit-alt"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="deleteCategory(${row.category_type_id })">
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
            'categoryTable', // table_id
            "<?= base_url(route_to('categoryType_list_api')) ?>", // url
            'POST', // method
            parameter, // parameter
            successDataTableCallbackFunction // dataTableSuccessCallBack
        );
    }
    $(document).ready(function() {
        fetchTableData();
    });
</script>