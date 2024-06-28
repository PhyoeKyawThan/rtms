<?php

function uploadFile($file, string $target_dir)
{
    $path = __DIR__."/../public/".$target_dir."/" . basename($file["name"]);
    $is_exists = file_exists($path);
    $temp_file = $file["tmp_name"];

    // Define a list of forbidden file extensions
    $forbidden_extensions = ['exe', 'sh', 'php', 'bat', 'cmd', 'js', 'pl', 'py', 'cgi'];

    // Extract the file extension
    $file_extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

    // Check if the file extension is forbidden
    if (in_array($file_extension, $forbidden_extensions)) {
        return false;
    }

    if ($is_exists) {
        return $file["name"];
        // echo json_encode(array("status" => "Fail", "message" => "File Already Exists", "image_uri" => $file["name"]));
    }
    try {
        if (move_uploaded_file($temp_file, $path)) {
            return $file["name"];
        }
        return false;
    } catch (Exception $e) {
        return false;
    }
}

?>
