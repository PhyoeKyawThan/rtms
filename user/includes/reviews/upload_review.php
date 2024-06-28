<?php
session_start();
include(__DIR__."/../../model/db.php");
// Define forbidden keywords
define("FORBID_KEYWORDS", array(
    "badword1",
    "badword2",
    "anotherbadword"
));

if(!isset($_SESSION["current_user"])){
    http_response_code(401);
    header("Location: /home?p=reviews&review_error=U must Login To Upload Review");
    exit;
}
// Check for forbidden keywords
foreach (FORBID_KEYWORDS as $keyword) {
    if (stripos($_POST["content"], $keyword) !== false) {
        // Forbidden keyword found, handle the error
        header("Location: /home?p=reviews&review_error=Your review contains forbidden words.");
        exit();
    }
}
$db = new DB();
if($db->is_connected()){
    $new_review = array(
       "user_id"=> $_SESSION["current_user"]["user_id"],
       "content"=> $_POST["content"]
    );
    if($db->insert("review", $new_review)){
        http_response_code(200);
        header("Location: /home?p=reviews&review_message=Upload Success");
        exit;
    }
}

http_response_code(500);
header("Location: /home?p=reviews&review_error=Something Wrong with server");
exit;
