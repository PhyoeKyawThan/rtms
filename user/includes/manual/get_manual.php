<?php

if($db->is_connected()){
    $sql = "SELECT * FROM manual ORDER BY id DESC LIMIT 1";
    $connect = $db->get_connection();
    $manual = $connect->query($sql);
    if($manual->num_rows > 0){
        $manual = $manual->fetch_assoc();
    }
    
}
?>