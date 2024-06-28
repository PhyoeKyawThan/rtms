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
      echo "file already exists.";
      return basename($_FILES["profile"]["name"]);
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
    $update_user = array(
        "username" => $_POST["username"],
        "email" => $_POST["email"],
        "vehicle_number" => $_POST["vehicle-license"],
        "phone" => $_POST["phone"],
        "birth_date" => $_POST["birth_date"],
    );
    
    if(isset($_FILES["profile"]) && $_FILES["profile"]["error"] == 0){
        $update_user["profile_url"] = uploadProfile();
        // print_r($update_user);
        // exit;
    }
    if ($db->update("user", $update_user, array("user_id" => $_SESSION["current_user"]["user_id"]))) {
        $_SESSION["current_user"] = $db->get_data_by_id("user", $_SESSION["current_user"]["user_id"], "user_id");
        http_response_code(200);
        header("Location: /home?p=profile&profile_message=Updated");
        exit;
    }
    http_response_code(500);
    header("Location: /home?p=profile&profile_error=Error While Updating Data");
    exit;
}

http_response_code(500);
header("Location: /home?p=profile&profile_error=Error While Updating data");
exit;

?>