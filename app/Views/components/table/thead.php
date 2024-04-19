<thead class="thead-dark">
    <tr>
        <?php
        if (isset($columns) && is_array($columns)) {
            foreach ($columns as $column) {
                if (is_string($column)) {
                    echo view("Views/components/table/th",['value'=>$column]);
                } else {
                    echo view("Views/components/table/th");
                }
            }
        }
        ?>
    </tr>
</thead>