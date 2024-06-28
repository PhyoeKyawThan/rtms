<?php
include (__DIR__ . "/../../model/db.php");

function search(string $unique_column_name, $unique_value, string $table_name)
{
    $sql = "SELECT * FROM $table_name WHERE $unique_column_name = ? ";
    $db = new DB();
    if ($db->is_connected()) {
        $connect = $db->get_connection();
        if ($connect) {
            $result = $connect->prepare($sql);
            $result->bind_param(is_int($unique_value) ? "d": "s", $unique_value);
            $result->execute();
            $result = $result->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row;
            }
            return [];
        }
    }
    return [];
}

?>