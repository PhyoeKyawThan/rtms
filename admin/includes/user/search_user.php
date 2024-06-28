<?php
include (__DIR__ . "/../../model/db.php");
$db = new DB();
if ($db->is_connected()) {
    if (!isset($_GET["username"])) {
        header("Content-Type: application/json");
        http_response_code(200);
        echo json_encode(array("status" => "error", "message" => "Be sure your info"));
        exit;
    }
    $username = $_GET["username"];
    $user_data = $db->get_data_by_unique_string("user", $username, "username");
    if(isset($user_data["user_id"])){
        header("Content-Type: application/json");
        echo json_encode(array(
            "status"=> "found",
            "message"=> "User Found",
            "view"=> "/view_user?user_id=".$user_data["user_id"]."",
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