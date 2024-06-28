<?php
include (__DIR__ . "/../../model/db.php");
$db = new DB();
if ($db->is_connected()) {
    if (!isset($_GET["vehicle_number"])) {
        header("Content-Type: application/json");
        http_response_code(200);
        echo json_encode(array("status" => "error", "message" => "Be sure your info"));
        exit;
    }
    $vehicle_number = $_GET["vehicle_number"];
    $vehicle_data = $db->get_data_by_unique_string('vehicle_license', $vehicle_number, 'vehicle_number');
    if(isset($vehicle_data["id"])){
        header("Content-Type: application/json");
        echo json_encode(array(
            "status"=> "found",
            "message"=> "Vehicle Number Found",
            "view"=>"/view_vehicle?id=".$vehicle_data["id"]."",
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