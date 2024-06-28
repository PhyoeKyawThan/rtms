<?php
session_start();
if (!isset($_SESSION["current_admin"])) {
    header("Location: login_view.php");
}

$admin_id = $_SESSION["current_admin"]["admin_id"];

include_once (__DIR__."/../../model/db.php");
include_once(__DIR__."/../uploadFile.php");

// initial db object to get connection
$db = new DB();
// check db is connected or not
if ($db->is_connected()) {
    // get connection
    $conncet = $db->get_connection();
    // get datas 
    $datas = array(
            "admin_id"=>$admin_id,
            "title"=>$_POST["title"],
            "content"=>$_POST["content"],
            // "image"=>uploadImage($_POST["file"])
    );
    $is_update = $db->update("news", $datas, array("news_id" => $_GET["news_id"]));
    $db->close();
    // return json formatted datas
    if ($is_update) {
        http_response_code(200);
        header("Location: /view_news?id=".$_GET["news_id"]."&message=ပြင်ဆင်မွမ်းမံခြင်းအောင်မြင်ပါသည်");
        exit();
    } else {
        http_response_code(500);
        header("Location: /view_news?id=".$_GET["news_id"]."&error=မှားယွင်းနေပါတယ် အချက်လက်များကို ပြန်စစ်ဆေးပါ");
        exit();
    }
} else {
    http_response_code(500);
    header("Location: /view_news?id=".$_GET["news_id"]."&error=မှားယွင်းနေပါတယ် အချက်လက်များကို ပြန်စစ်ဆေးပါ");
}


?>