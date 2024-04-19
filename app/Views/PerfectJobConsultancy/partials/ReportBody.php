<style>
    .tabulator .tabulator-header .tabulator-col {
        background: #eda3a3;
        color: #fff;
    }

    .tabulator .tabulator-footer {
        background-color: #fff;
    }

    .tabulator .tabulator-footer .tabulator-page.active {
        color: #fff;
    }

    .tabulator .tabulator-footer .tabulator-page {
        color: #fff;
        background: #33a186;
    }

    .tabulator .tabulator-header .tabulator-col.tabulator-sortable.tabulator-col-sorter-element:hover {
        cursor: pointer;
        background-color: #eda3a3;
    }

    .tabulator .tabulator-header .tabulator-col.tabulator-sortable[aria-sort=none] .tabulator-col-content .tabulator-col-sorter .tabulator-arrow {
        border-top: none;
        border-bottom: 6px solid #fff;
    }

    .tabulator .tabulator-header .tabulator-col.tabulator-sortable[aria-sort=descending] .tabulator-col-content .tabulator-col-sorter .tabulator-arrow {
        border-bottom: none;
        border-top: 6px solid #fff;
        color: #fff;
    }

    /* Custom CSS to fix the width issue of Select2 dropdown in the header */
    .tabulator-header-filter .select2-container--default .select2-selection--multiple {
        min-width: 200px;
    }

    .ExportExcelBtnBg {
        background: #00939C !important;
    }

    .refreshBtnBG {
        background: #007369 !important;
    }

    .PdfExcelRefreshIcn {
        color: #fff;
        margin: 5px;
        font-size: 18px;
    }

    a {
        color: black;
    }

    td {
        text-align: right;
    }

    .bottomBorder {
        border-bottom: 2px solid #e5e1e1;
    }

    .SDFJCC {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<div class="row ps-3 pe-3">
    <div class="col-md-4 d-none">
        <div class="row">
            <div class="col-md-4">
                <label for="groupColumn" style="padding-top: 7px;">Group By:</label>
            </div>
            <div class="col-md-8">
                <select id="groupColumn" class="form-control" onclick="generateGroupBy()">
                    <option value="">Select Column</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="input-group rounded-sm bottomBorder">
            <i class="bx bx-search fs-5 SDFJCC"></i><input id="fSearch" class="form-control border-0" type="text" placeholder="Search here...">
        </div>
    </div>
    <div class="col-md-2 d-flex justify-content-end">
        <button name="pdf" id="exportPdf" class="btn border-white" role="button">
            <i class="fa fa-file-pdf-o" aria-hidden="true" style="color:red; font-size:25px;" title="Download PDF"></i>
        </button>
        <button name="excel" id="exportExcel" class="btn border-white" role="button">
            <i class="fa fa-file-excel-o" aria-hidden="true" style="color:green; font-size:25px;" title="Download Excel"></i>
        </button>
        <button name="refresh" id="refresh" class="btn border-white" role="button">
            <i class="fa fa-refresh" aria-hidden="true" style="color:green; font-size:22px" title="Refresh"></i>
        </button>
        <!-- Your button -->
        <!-- Your button -->
        <button type="button" class="btn border-white" data-bs-toggle="modal" data-bs-target="#filterModal">
            <i class="fa fa-filter" aria-hidden="true" style="color:grey; font-size:22px" title="Filter"></i>
        </button>
    </div>

    <div class="col-md-3"></div>
    <div class="col-md-1 mt-2">
        <?php if (isset($CreatePageUrl)) : ?>
            <a href="<?= $CreatePageUrl ?>"><i class="fa fa-plus text-primary" aria-hidden="true" style="color: grey; font-size: 22px;" title="Add Record"></i></a>
        <?php endif; ?>
    </div>

</div>
<div id="example-table">

</div>