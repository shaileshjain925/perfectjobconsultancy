<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>
            Category
        </h4>

        <button class="btn btn-primary" onclick="editCategory()" type="button" data-bs-toggle="offcanvas" data-bs-target="#RightSlideBox" aria-controls="RightSlideBox">
            <i class="bx bxs-user-plus"></i> Add Category
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

<div class="offcanvas offcanvas-end" tabindex="-1" id="RightSlideBox" aria-labelledby="RightSlideBox">

</div>




<script>
    var DeleteApiUrl = "<?= base_url(route_to('category_delete_api')) ?>"

    function successCallback(response) {
        if (response.status == 200 || response.status == 201) {
            $(".offcanvas button[data-bs-dismiss='offcanvas']").click();
            fetchTableData({_autojoin:"Y",_select:"*"});
        }
    }

    function errorCallback(response) {
        console.log(response);
    }

    function deleteCategory(category_id) {
        deleteRow({
                "category_id": category_id
            }).then((response) => {
                fetchTableData({_autojoin:"Y",_select:"*"});
            })
            .catch((error) => {
                console.error("Deletion failed or cancelled:", error);
            });
    }

    function editCategory(category_id = null) {
        $.ajax({
            type: "get",
            url: "<?= base_url(route_to("CategoryCreateUpdate")) ?>" + (category_id ? "/" + category_id : ""),
            success: function(response) {
                $("#RightSlideBox").html("");
                $("#RightSlideBox").html(response);
                initializeSelectize('category_type_id',{},"<?=base_url(route_to('categoryType_list_api'))?>",{},"category_type_id","category_type_name",selected_category_type_id)
            }
        });
    }

    function successDataTableCallbackFunction(response) {
        var columns = [{
                title: "Category ID",
                data: "category_id"
            },
            {
                title: "Category Name",
                data: "category_name"
            },
            {
                title: "Category Type",
                data: "category_type_name"
            },
            {
                title: "Image",
                data: null,
                "render": function(data, type, row) {
                    return `
                    <img class="image-fluid" style="height:auto; width:100px" src="<?=base_url()?>/${row.category_image }">
                    `;
                }
            },
            {
                title: "Description",
                data: "category_description"
            },
            {
                title: "SEO Keywords",
                data: "category_seo_keyword"
            },
            {
                title: "SEO Description",
                data: "category_seo_description"
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
                            <button class="btn btn-sm btn-info" onclick="editCategory(${row.category_id })" data-bs-toggle="offcanvas" data-bs-target="#RightSlideBox" aria-controls="RightSlideBox">
                                <i class="bx bx-edit-alt"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="deleteCategory(${row.category_id })">
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
            "<?= base_url(route_to('category_list_api')) ?>", // url
            'POST', // method
            parameter, // parameter
            successDataTableCallbackFunction // dataTableSuccessCallBack
        );
    }
    $(document).ready(function() {
        fetchTableData({_autojoin:"Y",_select:"*"});
    });
</script>