<?php
if (isset($row) && is_array($row)) {
    echo "<tr id='" . ((isset($row_id)) ? $row_id : "") . "'>";
    foreach ($row as $td) {
        if (is_string($td)) {
            echo view('Views/components/table/td', ['value' => $td]);
        }
    }
    echo "</tr>";
}
