<?php
include(__DIR__."/../../model/db.php");

$db = new DB();
if ($db->is_connected()) {
    $connect = $db->get_connection();
    $sql = "SELECT * FROM pending_license WHERE current_card= ?";
    $existStmt = $connect->prepare($sql);
    $existStmt->bind_param("s", $_POST["current_card_number"]);
    $existStmt->execute();
    $existResult = $existStmt->get_result();
    $exist = $existResult->fetch_assoc();
    if ($exist) {
        header("Location: /home?p=driving_register&driving_error=ဤကဒ်အမှတ်ဖြင့်စာရင်းသွင်းပြီးသားဖြစ်ပါသည်");
        exit();
    }

    $sql = "SELECT * FROM driving_license WHERE card_number=?";
    $previousStmt = $connect->prepare($sql);
    $previousStmt->bind_param("s", $_POST["current_card_number"]);
    $previousStmt->execute();
    $previousResult = $previousStmt->get_result();
    $previousResult = $previousResult->fetch_assoc();
    if ($previousResult) {
        $register_data = [
            "name" => $_POST["name"],
            "want_license" => $_POST["want_license"],
            "father_name" => $_POST["father_name"],
            "current_card" => $_POST["current_card_number"],
            "address" => $_POST["address"],
            "driving_id" => $previousResult["driving_id"],
            "birth_date" => $_POST["birth_date"]
        ];

        if ($db->insert("pending_license", $register_data)) {
            http_response_code(200);
            header("Location: /home?p=driving_register&driving_message=စာရင်းသွင်းခြင်းအောင်မြင်ပါတယ်");
            exit();
        }
    }else{
        header("Location: /home?p=driving_register&driving_error=လက်ရှိကဒ်နံပါတ်မှားယွင်းနေပါတယ်");
        exit();
    }

    http_response_code(500);
    header("Location: /home?p=driving_register&driving_error=အမှားယွင်းဖြစ်နေပါတယ်");
    exit();
}
?>