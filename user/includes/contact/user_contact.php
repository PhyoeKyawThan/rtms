<?php
include(__DIR__."/../../model/db.php");

$db = new DB();

if($db->is_connected()){
    if($db->insert("contact", array(
        "email"=> $_POST["email"],
        "title"=> $_POST["title"],
        "content"=> $_POST["content"],
        "user_id"=> isset($_SESSION["current_user"]) ? $_SESSION["current_user"]["user_id"] : null,
    ))){
        http_response_code(200);
        header("Location: /home?p=contact&message=ပို့ပြီးပါပြီ");
        exit();
    }
    http_response_code(200);
    header("Location: /home?p=contact&error=အချက်လက်များကို ပြန်စစ်ဆေးပါ");
    exit();
}
http_response_code(500);
header("Location: /home?p=contact&error=အချက်လက်များကို ပြန်စစ်ဆေးပါ");
exit();


?>