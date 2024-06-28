<?php
include(__DIR__."/../../model/db.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $db = new DB();
    if($db->is_connected()){
        if($db->delete("id", $id,"vehicle_license")){
            http_response_code(200);
            header("Location: /home?p=vehicles&success=Deleted");
            exit();
        }
    }
}
http_response_code(403);
header("Location: /home?p=vehicles&error=Something went Wrong");
exit();
?>