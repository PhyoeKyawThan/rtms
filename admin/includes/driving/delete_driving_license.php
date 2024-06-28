<?php
include_once(__DIR__."/../../model/db.php");

// $table_name = $_GET["name"];
$id = $_GET["id"];
$db = new DB();

if($db->delete("driving_id", $id, "driving_license")){
    http_response_code(200);
    header("Location: /home?p=driving&message=Deleted");
    exit();
}else{
    http_response_code(500);
    header("Location: /home?p=driving&id=".$id."&message=မှားယွင်းနေပါတယ်");
}
$db->close();

?>