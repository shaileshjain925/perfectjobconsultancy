<div class='table-responsive'>
    <table class="table table-striped table-bordered">
        <?php
        if (isset($columns)) {
            echo view('Views/components/table/thead', ['columns' => @$columns]);
        } else {
            view('Views/components/table/thead',);
        }
        if (isset($columns)) {
            echo view('Views/components/table/tbody', ['data' => @$data]);
        } else {
            view('Views/components/table/tbody',);
        }
        ?>
    </table>
</div>