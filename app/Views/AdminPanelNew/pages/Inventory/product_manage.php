<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>
            Product
        </h4>
        <a href="<?= base_url(route_to('create_product')) ?>" class="btn btn-primary" target="_blank" type="button">
            <i class="bx bxs-user-plus"></i> Add Product
        </a>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="table-responsive">
                <table id="productTable" class="display table table-striped table-bordered mb-0"></table>
            </div>
        </div>
    </div>
</div>

</div>
<!-- View product form offcanvas -->
<?= view("AdminPanelNew/pages/component/product-view-slide") ?>


<script>
var DeleteApiUrl = "<?= base_url(route_to('product_delete_api')) ?>"

function successCallback(response) {
    if (response.status == 200 || response.status == 201) {
        $(".offcanvas button[data-bs-dismiss='offcanvas']").click();
        fetchTableData({
            _autojoin: "Y",
            _select: "*"
        });
    }
}

function errorCallback(response) {
    console.log(response);
}

function deleteProduct(product_id) {
    deleteRow({
            "product_id": product_id
        }).then((response) => {
            fetchTableData({
                _autojoin: "Y",
                _select: "*"
            });
        })
        .catch((error) => {
            console.error("Deletion failed or cancelled:", error);
        });
}


function successDataTableCallbackFunction(response) {
    var columns = [{
            title: "Product ID",
            data: "product_id"
        },
        {
            title: "Date",
            data: "created_at"
        },
        {
            title: "Product Id",
            data: "product_code"
        },
        {
            title: "Product Name",
            data: "product_name"
        },
        {
            "title": "Variant",
            "data": null,
            "render": function(data, type, row) {
                return `
            <a href="<?= base_url(route_to('variant_create_update','')) ?>/${row.product_id}" target="_blank" class="btn btn-sm btn-warning">
                <i class="bx bx-plus"></i> Add Variant
            </a>
            <a href="<?= base_url(route_to('variant_list','')) ?>/${row.product_id}" target="_blank" class="btn btn-sm btn-primary">
                View
            </a>
        `;
            }
        },

        {
            "title": "Actions",
            "data": null,
            "render": function(data, type, row) {
                return `
                            <a class="btn btn-sm btn-info" href="<?= base_url(route_to('create_product')) ?>/${row.product_id }" >
                                <i class="bx bx-edit-alt"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" onclick="deleteProduct(${row.product_id })">
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
        'productTable', // table_id
        "<?= base_url(route_to('product_list_api')) ?>", // url
        'POST', // methodt
        parameter, // parameter
        successDataTableCallbackFunction // dataTableSuccessCallBack
    );
}
$(document).ready(function() {
    fetchTableData({
        _autojoin: "Y",
        _select: "*"
    });
});
</script>