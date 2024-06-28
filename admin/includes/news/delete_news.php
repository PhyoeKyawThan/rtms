<?php
include_once(__DIR__."/../../model/db.php");

// $table_name = $_GET["name"];
$id = $_GET["id"];
$db = new DB();
if($db->delete("news_id", $id,"news")) {
    http_response_code(200);
    header("Location: /home?p=news&message=Deleted");
    exit();
}else{
    http_response_code(500);
    header("Location: /home?p=news&id=".$id."&message=မှားယွင်းနေပါတယ်");
    exit();
}

?>