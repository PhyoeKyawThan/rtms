<?php
session_start();
include (__DIR__ . "/../../model/db.php");

$db = new DB();
function uploadProfile()
{

  if (isset($_POST['submit'])) {
    // Directory where uploaded files will be saved
    $target_dir = __DIR__."/../../public/profiles/";
    // Path to the file to be uploaded
    $target_file = $target_dir . basename($_FILES["profile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["profile"]["tmp_name"]);
    if ($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size (limit to 5MB)
    if ($_FILES["profile"]["size"] > 5000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      return false;
    } else {
      // if everything is ok, try to upload file
      if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["profile"]["name"])) . " has been uploaded.";
        return htmlspecialchars(basename($_FILES["profile"]["name"]));
      } else {
        echo "Sorry, there was an error uploading your file.";
        return false;
      }
    }
  }


}
if ($db->is_connected()) {
  $profile_upload = uploadProfile();
  if ($profile_upload) {
    $new_user = [
      "username" => $_POST["username"],
      "email" => $_POST["email"],
      "profile_url" => $profile_upload,
      "phone" => $_POST["phone"],
      "vehicle_number" => $_POST["vehicle-license"],
      "birth_date" => $_POST["birth_date"],
      "password" => $_POST["password"],
    ];
    if ($db->insert("user", $new_user)) {
      $registered_user = $db->get_user($new_user["email"], $new_user["password"]);
      if (isset($registered_user)) {
        $_SESSION["current_user"] = $registered_user;
        http_response_code(200);
        header("Location: /home?message=Welcome " . $new_user["username"]);
        exit;
      }
    }
  }
  http_response_code(500);
  header("Location: /register?error=Error While Creating User");
  exit;
}
http_response_code(500);
header("Location: /register?error=Error While Creating User");
exit;
?>