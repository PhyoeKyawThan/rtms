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
        "vehicle_number" => $_POST["vehicle-number"],
        "name" => $_POST["name"],
        "nrc" => $_POST["nrc"],
        "address" => $_POST["address"],
        "vehicle_brand" => $_POST["vehicle-brand"],
        "vehicle_type" => $_POST["vehicle-type"],
        "unique_no" => $_POST["unique-no"],
        "vehicle_weight" => $_POST["vehicle-weight"],
        "vehicle_load" => $_POST["vehicle-load"],
        "color" => $_POST["color"],
<<<<<<< HEAD
        "exp_date" => $_POST["exp-date"]
=======
        "exp_date" => $_POST["exp-date"],
        "register_date" => $_POST["register-date"],
>>>>>>> d9eecb5 ([add] date filter in vehicle and table showing in dashboard)
    );
    $is_inserted = $db->update("vehicle_license", $datas, array("id" => $_GET["id"]));
    $db->close();
    // return json formatted datas
    if ($is_inserted) {
        http_response_code(200);
        header("Location: /view_vehicle?id=".$_GET["id"]."&message=လိုင်စင်နံပါတ် ". $datas["vehicle_number"]." ပြင်ဆင်မွမ်းမံခြင်းအောင်မြင်ပါသည်");
        exit();
    } else {
        http_response_code(500);
        header("Location: /view_vehicle?error=မှားယွင်းနေပါတယ် အချက်လက်များကို ပြန်စစ်ဆေးပါ");
        exit();
    }
} else {
    http_response_code(500);
    header("Location: /view_vehicle?error=မှားယွင်းနေပါတယ် အချက်လက်များကို ပြန်စစ်ဆေးပါ");
    exit();
}


?>