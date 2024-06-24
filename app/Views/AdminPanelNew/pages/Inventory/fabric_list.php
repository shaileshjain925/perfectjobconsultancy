<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>
            Fabric
        </h4>
        <button class="btn btn-primary" onclick="editFabric()" type="button" data-bs-toggle="offcanvas" data-bs-target="#RightSlideBox" aria-controls="RightSlideBox">
            <i class="bx bxs-user-plus"></i> Add Fabric
        </button>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="table-responsive">
                <table id="fabricTable" class="display table table-striped table-bordered mb-0"></table>
            </div>
        </div>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="RightSlideBox" aria-labelledby="RightSlideBox">

</div>




<script>
    var DeleteApiUrl = "<?= base_url(route_to('fabric_delete_api')) ?>"

    function successCallback(response) {
        if (response.status == 200 || response.status == 201) {
            $(".offcanvas button[data-bs-dismiss='offcanvas']").click();
            fetchTableData();
        }
    }

    function errorCallback(response) {
        console.log(response);
    }

    function deleteFabric(fabric_id) {
        deleteRow({
                "fabric_id": fabric_id
            }).then((response) => {
                fetchTableData();
            })
            .catch((error) => {
                console.error("Deletion failed or cancelled:", error);
            });
    }

    function editFabric(fabric_id = null) {
        $.ajax({
            type: "get",
            url: "<?= base_url(route_to("fabricCreateUpdate")) ?>" + (fabric_id ? "/" + fabric_id : ""),
            success: function(response) {
                $("#RightSlideBox").html("");
                $("#RightSlideBox").html(response);

            }
        });
    }

    function successDataTableCallbackFunction(response) {
        var columns = [{
                title: "Fabric ID",
                data: "fabric_id"
            },
            {
                title: "Fabric Name",
                data: "fabric_name"
            },
            {
                title: "SEO Keywords",
                data: "fabric_seo_keywords"
            },
            {
                title: "SEO Description",
                data: "fabric_seo_description"
            },

            {
                "title": "Actions",
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <button class="btn btn-sm btn-info" onclick="editFabric(${row.fabric_id  })" data-bs-toggle="offcanvas" data-bs-target="#RightSlideBox" aria-controls="RightSlideBox">
                                <i class="bx bx-edit-alt"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="deleteFabric(${row.fabric_id  })">
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
            'fabricTable', // table_id
            "<?= base_url(route_to('fabric_list_api')) ?>", // url
            'POST', // method
            parameter, // parameter
            successDataTableCallbackFunction // dataTableSuccessCallBack
        );
    }
    $(document).ready(function() {
        fetchTableData();
    });
</script>