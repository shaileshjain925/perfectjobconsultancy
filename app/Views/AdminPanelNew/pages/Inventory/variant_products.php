<div class="card">
    <div class="card-header">
        <h4>
            <?= @$product_data['product_name'] ?> (<?= @$product_data['product_code'] ?>)
        </h4>
    </div>
    <div class="card-body">
        <div class="card-body">
            <div class="table-responsive">
                <div class="table-responsive">
                    <table id="variantTable" class="display table table-striped table-bordered mb-0"></table>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas offcanvas-end offcanvas-product" tabindex="-1" id="viewproduct" aria-labelledby="viewproductLable"></div>


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

        function deleteProduct(variant_id) {
            deleteRow({
                    "variant_id": variant_id
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

        function VariantDisplay(variant_id) {
            $.ajax({
                type: "post",
                url: "<?= base_url(route_to("VariantView")) ?>",
                data:{
                    variant_id: variant_id,
                },
                success: function(response) {
                    $("#viewproduct").html("");
                    $("#viewproduct").html(response);
                }
            });
        }


        function successDataTableCallbackFunction(response) {
            var columns = [{
                    title: "Variant ID",
                    data: "variant_id"
                },
                {
                    title: "Variant Name",
                    data: "variant_name"
                },
                {
                    title: "Color",
                    data: "color_name",
                },
                {
                    title: "Price",
                    data: "selling_price"
                },
                {
                    title: "In Stock",
                    data: "minimum_stock"
                },
                {
                    title: "Is Active",
                    data: "is_active"
                },
                {
                    "title": "Actions",
                    "data": null,
                    "render": function(data, type, row) {
                        return `

                          <a href="<?= base_url(route_to('variant_create_update', '')) ?>${row.product_id}/${row.variant_id}" class="btn btn-sm btn-info">
                                <i class="bx bx-edit-alt"></i>
                            </a>
                             <button class="btn btn-primary btn-sm" type="button" onclick="VariantDisplay('${row.variant_id}')" data-bs-toggle="offcanvas" data-bs-target="#viewproduct" aria-controls="viewproduct">
                                <i class="mdi mdi-file-eye-outline"></i>
                            </button>
                          <div class="mt-2 d-none">
                                <input type="checkbox" id="switch9" switch="dark" checked />
                                <label class="form-label" for="switch9" data-on-label="Active" data-off-label="Block"></label>
                            </div>
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
                'variantTable', // table_id
                "<?= base_url(route_to('variant_list_api')) ?>", // url
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