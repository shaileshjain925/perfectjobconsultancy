<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>
            Brand
        </h4>

        <button class="btn btn-primary" onclick="editBrand()" type="button" data-bs-toggle="offcanvas" data-bs-target="#AddRole" aria-controls="AddRole">
            <i class="bx bxs-user-plus"></i> Add Brand
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="table-responsive">
                <table id="brandTable" class="display table table-striped table-bordered mb-0"></table>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="AddRole" aria-labelledby="AddRoleLabel">

</div>




<script>
    var DeleteApiUrl = "<?= base_url(route_to('brand_delete_api')) ?>"

    function successCallback(response) {
        if (response.status == 200 || response.status == 201) {
            $(".offcanvas button[data-bs-dismiss='offcanvas']").click();
            fetchTableData();
        }
    }

    function errorCallback(response) {
        console.log(response);
    }

    function deleteBrand(brand_id) {
        deleteRow({
                "brand_id": brand_id
            }).then((response) => {
                fetchTableData();
            })
            .catch((error) => {
                console.error("Deletion failed or cancelled:", error);
            });
    }

    function editBrand(brand_id = null) {
        $.ajax({
            type: "get",
            url: "<?= base_url(route_to("BrandCreateUpdate")) ?>" + (brand_id ? "/" + brand_id : ""),
            success: function(response) {
                $("#AddRole").html("");
                $("#AddRole").html(response);

            }
        });
    }

    function successDataTableCallbackFunction(response) {
        var columns = [{
                title: "Brand ID",
                data: "brand_id"
            },
            {
                title: "Brand Name",
                data: "brand_name"
            },
            {
                title: "Image",
                data: null,
                "render": function(data, type, row) {
                    return `
                    <img class="image-fluid" style="height:auto; width:100px" src="<?=base_url()?>/${row.brand_image }">
                    `;
                }
            },
            {
                title: "Description",
                data: "brand_description"
            },
            {
                title: "SEO Keywords",
                data: "brand_seo_keyword"
            },
            {
                title: "SEO Description",
                data: "brand_seo_description"
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
                            <button class="btn btn-sm btn-info" onclick="editBrand(${row.brand_id })" data-bs-toggle="offcanvas" data-bs-target="#AddRole" aria-controls="AddRole">
                                <i class="bx bx-edit-alt"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="deleteBrand(${row.brand_id })">
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
            'brandTable', // table_id
            "<?= base_url(route_to('brand_list_api')) ?>", // url
            'POST', // method
            parameter, // parameter
            successDataTableCallbackFunction // dataTableSuccessCallBack
        );
    }
    $(document).ready(function() {
        fetchTableData();
    });
</script>