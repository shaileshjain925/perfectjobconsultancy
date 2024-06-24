<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>
            Pattern
        </h4>
        <button class="btn btn-primary" onclick="editPattern()" type="button" data-bs-toggle="offcanvas" data-bs-target="#RightSlideBox" aria-controls="RightSlideBox">
            <i class="bx bxs-user-plus"></i> Add pattern
        </button>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="table-responsive">
                <table id="addpatternTable" class="display table table-striped table-bordered mb-0"></table>
            </div>
        </div>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="RightSlideBox" aria-labelledby="RightSlideBox">

</div>




<script>
    var DeleteApiUrl = "<?= base_url(route_to('pattern_delete_api')) ?>"

    function successCallback(response) {
        if (response.status == 200 || response.status == 201) {
            $(".offcanvas button[data-bs-dismiss='offcanvas']").click();
            fetchTableData();
        }
    }

    function errorCallback(response) {
        console.log(response);
    }

    function deletePattern(pattern_id) {
        deleteRow({
                "pattern_id": pattern_id
            }).then((response) => {
                fetchTableData();
            })
            .catch((error) => {
                console.error("Deletion failed or cancelled:", error);
            });
    }

    function editPattern(pattern_id = null) {
        $.ajax({
            type: "get",
            url: "<?= base_url(route_to("PatternCreateUpdate")) ?>" + (pattern_id ? "/" + pattern_id : ""),
            success: function(response) {
                $("#RightSlideBox").html("");
                $("#RightSlideBox").html(response);

            }
        });
    }

    function successDataTableCallbackFunction(response) {
        var columns = [{
                title: "Pattern ID",
                data: "pattern_id"
            },
            {
                title: "Pattern Name",
                data: "pattern_name"
            },
            {
                title: "SEO Keywords",
                data: "pattern_seo_keywords"
            },
            {
                title: "SEO Description",
                data: "pattern_seo_description"
            },

            {
                "title": "Actions",
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <button class="btn btn-sm btn-info" onclick="editPattern(${row.pattern_id  })" data-bs-toggle="offcanvas" data-bs-target="#RightSlideBox" aria-controls="RightSlideBox">
                                <i class="bx bx-edit-alt"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="deletePattern(${row.pattern_id  })">
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
            'addpatternTable', // table_id
            "<?= base_url(route_to('pattern_list_api')) ?>", // url
            'POST', // method
            parameter, // parameter
            successDataTableCallbackFunction // dataTableSuccessCallBack
        );
    }
    $(document).ready(function() {
        fetchTableData();
    });
</script>