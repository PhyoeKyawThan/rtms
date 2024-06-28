<?php
// session_start();
// if (!isset($_SESSION["current_admin"])) {
//     header("Location: login_view.php");
// }

include(__DIR__."/../../model/db.php");

// initial db object to get connection
$db = new DB();
// check db is connected or not
if ($db->is_connected()) {
    // get connection
    $conncet = $db->get_connection();
    // get datas 
    $datas = array(
        "username"=>$_POST["username"],
        "phone"=>(isset($_POST["phone"]))?$_POST["phone"]:"",
        "email"=>$_POST["email"],
        "password"=>$_POST["password"],
        "birth_date"=>$_POST["birth_date"],
    );
    $is_inserted = $db->update("user", $datas, array("user_id" => $_GET["user_id"]));
    $db->close();
    // return json formatted datas
    if ($is_inserted) {
        http_response_code(200);
        header("Location: /view_user?user_id=".$_GET["user_id"]."&message=ပြင်ဆင်မွမ်းမံခြင်းအောင်မြင်ပါသည်");
        exit();
    } else {
        http_response_code(500);
        header("Location: /view_user?user_id=".$_GET["user_id"]."&error=မှားယွင်းနေပါတယ် အချက်လက်များကို ပြန်စစ်ဆေးပါ");
        exit();
    }
} else {
    http_response_code(500);
    header("Location: /view_user?user_id=".$_GET["user_id"]."&error=မှားယွင်းနေပါတယ် အချက်လက်များကို ပြန်စစ်ဆေးပါ");
    exit();
}


?>