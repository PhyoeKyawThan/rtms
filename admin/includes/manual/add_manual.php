<?php
session_start();
include_once(__DIR__."/../../model/db.php");
include_once(__DIR__."/../uploadFile.php");

$db = new DB();

if($db->is_connected()){
    $manual_path = uploadFile($_FILES["file"], "manuals");
    if(!$manual_path){
        http_response_code(405);    
        header("Location: /home?p=manual&message=U can't upload execuatble files");
        exit();
    }
    // get update data
    $manuald_data = array(
        "manual_path"=>$manual_path,
        "admin_id"=>$_SESSION["current_admin"]["admin_id"]
    );
    if($db->insert("manual",$manuald_data)){
        http_response_code(200);    
        header("Location: /home?p=manual&message=Success");
        exit();
    }
    http_response_code(403);
    header("Location: /home?p=manual&message=Something Wrong");
    exit();
}
http_response_code(500);
header("Location: /home?p=manual&message=Something Wrong with Server");
exit();

?>