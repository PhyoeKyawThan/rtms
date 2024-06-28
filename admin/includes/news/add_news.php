<?php
include(__DIR__."/../../auth_check/check.php");
include_once(__DIR__."/../../model/db.php");
include_once(__DIR__."/../uploadFile.php");

$db = new DB();

if( $db->is_connected()){
    $title = $_POST["title"];
    $content = $_POST["content"];
    $admin_id = $_SESSION["current_admin"]["admin_id"];
    $new_news = array(
        "admin_id"=>$admin_id,
        "title"=>$title,
        "image"=>uploadFile($_FILES["file"], "images"),
        "content"=>$content
    );
    if($db->insert("news", $new_news)){
        $db->close();
        header('Location: /add_news?message=သီတင်းအသစ်တင်ပြီးပါပြီ');
        exit();
    }else{
        header("Location: /add_news?message=အမှားယွင်းဖြစ်နေပါတယ်");
        exit();
    }
    // 
}


?>