<?php
include (__DIR__ . "/../../model/db.php");
$db = new DB();
if ($db->is_connected()) {
    if (!isset($_GET["date"])) {
        header("Content-Type: application/json");
        http_response_code(200);
        echo json_encode(array("status" => "error", "message" => "Be sure your info"));
        exit;
    }
    $date = isset($_GET["date"]) ? $_GET["date"]: "";
    $news = $db->get_many('news', $date, 'DATE(date)');
    if(count($news) > 0) {
        header("Content-Type: application/json");
        echo json_encode(array(
            "status"=> "found",
            "message"=> "Vehicle Number Found",
            "datas" => $news
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