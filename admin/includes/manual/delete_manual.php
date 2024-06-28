<?php
include (__DIR__ . "/../../model/db.php");

if (isset($_GET["manual_id"])) {
    $id = $_GET["manual_id"];
    $db = new DB();
    $path = $db->get_data_by_id("manual", $id, "id");
    $filePath = __DIR__ . "/../../public/manuals/" . $path["manual_path"];
    echo $filePath; // This will output the file path for debugging purposes

    // Ensure the script does not exit before unlink is called
    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            if ($db->is_connected()) {
                // Before deleting the manual, delete related review data
                if ($db->delete("id", $id, "manual")) {
                    http_response_code(200);
                    header("Location: /home?p=manual&success=Deleted");
                    exit();
                }
            }
        }
        http_response_code(200);
        header("Location: /home?p=manual&success=Fail To Delete Manual");
        exit();
    } else {
        // File does not exist
        http_response_code(404);
        header("Location: /home?p=manual&error=File Not Found");
        exit();
    }
}
http_response_code(403);
header("Location: /home?p=manual&error=Something went Wrong");
exit();
?>
