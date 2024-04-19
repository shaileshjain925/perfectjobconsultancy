<tbody>
    <?php
    if (isset($data) && is_array($data)) {
        foreach ($data as $row) {
            echo view('Views/components/table/tr', ['row' => $row]);
        }
    }
    ?>
</tbody>