<?php
include (__DIR__ . "/../../model/db.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $db = new DB();
    if ($db->is_connected()) {
        // before delete user we need to delete review data related with this user
        if ($db->delete("user_id", $id, "review") && $db->delete("user_id", $id, "contact")) {
            if ($db->delete("user_id", $id, "user")) {
                http_response_code(200);
                header("Location: /home?p=user&success=Deleted");
                exit();
            }
        }
    }
}
http_response_code(403);
header("Location: /home?p=user&error=Something went Wrong");
exit();
?>