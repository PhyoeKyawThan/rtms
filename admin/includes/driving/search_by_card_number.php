<?php
include (__DIR__ . "/../../model/db.php");
$db = new DB();
if ($db->is_connected()) {
    if (!isset($_GET["card_number"])) {
        header("Content-Type: application/json");
        http_response_code(200);
        echo json_encode(array("status" => "error", "message" => "Be sure your info"));
        exit;
    }
    $card_number = $_GET["card_number"];
    $card_data = $db->get_data_by_unique_string("driving_license", $card_number, "card_number");
    if(isset($card_data["driving_id"])){
        header("Content-Type: application/json");
        echo json_encode(array(
            "status"=> "found",
            "message"=> "Card Number Found",
            "view"=> "/view_driving_license?id=".$card_data["driving_id"]."",
        ));
        http_response_code(200);
        exit;
    }
    header("Content-Type: application/json");
    echo json_encode(array(
        "status"=> "fail",
        "message"=> "Not Found"
    ));
    http_response_code(200);
    exit;
}

?>