<?php

if ($db->is_connected()) {
    $connect = $db->get_connection();
    if ($connect) {
        $query = "SELECT * FROM pending_license";
        $result = $connect->prepare($query);
        $result->execute();
        $result = $result->get_result();
        $pendings = [];
        while ($row = $result->fetch_assoc()) {
            $pendings[] = $row;
        }
    }
}

?>